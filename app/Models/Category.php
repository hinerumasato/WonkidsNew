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
    protected $fillable = ['name'];

    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }

    public function languages(): BelongsToMany {
        return $this->belongsToMany(Language::class, 'categories_has_languages')->withPivot('name')->withTimestamps();
    }

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
}
