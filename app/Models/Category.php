<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Helpers\LoopHelper;

use function GuzzleHttp\Promise\all;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }

    public function languages(): BelongsToMany {
        return $this->belongsToMany(Language::class, 'categories_has_languages')->withPivot('name')->withTimestamps();
    }

    public function getOneLevelCategoriesData($locale) {
        return Category::select("categories")
            ->join("categories as c2", function($join){
                $join->on("categories.id", "=", "c2.parent_id");
            })
            ->join("categories_has_languages", function($join){
                $join->on("categories_has_languages.category_id", "=", "c2.id");
            })
            ->join("languages", function($join){
                $join->on("categories_has_languages.language_id", "=", "languages.id");
            })
            ->select("c2.id", "c2.parent_id", "c2.img", "categories_has_languages.name")
            ->where("categories.parent_id", "=", 0)
            ->where("languages.locale", "=", $locale)
            ->get();
    }

    public function getChildCategories(int $categoryId) {
        return Category::select("categories")
        ->join("categories as c2", function($join){
            $join->on("categories.parent_id", "=", "c2.id");
        })
        ->select("categories.id")
        ->where("categories.parent_id", "=", 9)
        ->get();
    }

    public function getNumberPostsById(int $categoryId, string $locale) {    
        $count = Category::where('id', $categoryId)
        ->withCount(['posts' => function ($query) use ($locale) {
            $query->join('posts_has_languages', 'posts.id', '=', 'posts_has_languages.post_id')
                ->join('languages', 'posts_has_languages.language_id', '=', 'languages.id')
                ->where('languages.locale', '=', $locale);
        }])
        ->first()
        ->posts_count;
        return $count;
    }
    
    /**
     * @deprecated since version 1.2.0
     */
    public function getOneLevelCategories() {
        $result = [];
        $categories = $this->all();
        $dataTree = LoopHelper::dataTree($categories->toArray());

        foreach ($dataTree as $item) {
            if($item['level'] == 1) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function getName($categoryId) {
        $category = Category::find($categoryId);
        $name = $category->languages()->where('locale', app()->getLocale())->first()->pivot->name;
        return $name;
    }

    public function getAllChildId($categoryId) {
        $result = Category::where('parent_id', $categoryId)->pluck('id')->toArray();
        return $result;
    }
}
