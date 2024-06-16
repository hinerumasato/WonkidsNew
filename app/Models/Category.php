<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Helpers\LoopHelper;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'active'];

    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }

    public function languages(): BelongsToMany {
        return $this->belongsToMany(Language::class, 'categories_has_languages')->withPivot('name', 'description')->withTimestamps();
    }

    public static function findAllWithRoot() {
        $categories = Category::all();
        $rootCategories = Category::where('parent_id', 0)->get();
        $rootIds = $rootCategories->pluck('id')->toArray();
        $categoryMap = [];

        foreach($rootCategories as $rootItem) {
            $categoryMap[$rootItem->id] = [];
        }

        foreach($categories as $category) {
            $parentId = $category->parent_id;
            if(in_array($parentId, $rootIds)) {
                $categoryMap[$parentId][] = $category;
            } else {
                while(!in_array($parentId, $rootIds) && $parentId != 0) {
                    $parentCategory = Category::find($parentId);
                    $parentId = $parentCategory->parent_id;
                    if(in_array($parentId, $rootIds)) {
                        $categoryMap[$parentId][] = $category;
                    }
                }
            }
        }
        return $categoryMap;
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

    public function getAllNumberPosts(string $locale): array {
        $categories = Category::query()
        ->withCount(['posts' => function ($query) use ($locale) {
            $query->join('posts_has_languages', 'posts.id', '=', 'posts_has_languages.post_id')
                ->join('languages', 'posts_has_languages.language_id', '=', 'languages.id')
                ->where('languages.locale', '=', $locale);
        }])
        ->get();

        $map = [];
        foreach ($categories as $category) {
            $postsCount = $category->posts_count;
            $map[$category->id] = $postsCount;

            if(array_key_exists($category->parent_id, $map)) {
                $old = $map[$category->parent_id];
                $new = $old + $postsCount;
                $map[$category->parent_id] = $new;
            }
        }
        return $map;
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

    public function getRootCategoryId() {
        $result = $this->id;
        $category = Category::find($this->id);
        while($category->parent_id != 0) {
            $result = $category->parent_id;
            $category = Category::find($result);
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

    public function getRootCategories() {
        return Category::where('parent_id', '=', 0)->get();
    }
}
