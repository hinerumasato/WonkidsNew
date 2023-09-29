<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Helpers\LoopHelper;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = ['category_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function languages(): BelongsToMany {
        return $this->belongsToMany(Language::class, 'posts_has_languages')->withPivot('title', 'content', 'slug', 'user_id', 'view')->withTimestamps();
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function getAllChildByLanguage($category_id, $language) {
        $result = [];

        foreach($language->posts as $post) {
            if($category_id == null || $category_id == 0)
                $result[] = $post->pivot;
            else {

                if($post->category->id == $category_id)
                    $result[] = $post->pivot;

                // Lấy các bài viết cấp con
                $categories = Category::all(); 
                $categoryTree = LoopHelper::dataTree($categories->toArray(), $category_id);
                foreach ($categoryTree as $category) {
                    if($category['id'] == $post->category->id)
                        $result[] = $post->pivot;
                }

            }
        }



        return $result;
    }

    public function getAmountByCategory($categoryId) {
        $posts = $this->where('category_id', $categoryId)->get();
        return count($posts);
    }

    public function deleteOne($post_id) {
        $postLanguageMedia = new PostLanguageMedia();        
        $postLanguageMedia->deleteByPostId($post_id);
        $uploadImgs = PostLanguageUploadImg::where('post_id', $post_id)->get();
        foreach ($uploadImgs as $img) {
            PostLanguageUploadImg::destroy($img->id);
            $link = UploadImg::find($img->upload_img_id)->link;
            $path = parse_url($link, PHP_URL_PATH);
            $path = substr($path, 1);
            File::delete($path);
            UploadImg::destroy($img->upload_img_id);
        }
        $post = Post::find($post_id);
        $post->languages()->detach();
    }

    public function updateView() {
        $this->pivot->view++;
        $this->pivot->save();
    }
}
