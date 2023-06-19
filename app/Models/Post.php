<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Helpers\LoopHelper;

class Post extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = ['category_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function languages(): BelongsToMany {
        return $this->belongsToMany(Language::class, 'posts_has_languages')->withPivot('title', 'content', 'slug')->withTimestamps();
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function getAllChildByLanguage($category_id, $language) {
        $posts = [];

        foreach($language->posts as $post) {
            if($category_id == null)
                $posts[] = $post->pivot;
            else {

                if($post->category->id == $category_id)
                    $posts[] = $post->pivot;

                // Lấy các bài viết cấp con
                $categories = Category::all(); 
                $categoryTree = LoopHelper::dataTree($categories->toArray(), $category_id);
                foreach ($categoryTree as $category) {
                    if($category['id'] == $post->category->id)
                        $posts[] = $post->pivot;
                }

            }
        }

        return $posts;
    }
}
