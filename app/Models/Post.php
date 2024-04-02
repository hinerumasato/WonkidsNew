<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Helpers\LoopHelper;
use Illuminate\Support\Facades\File;
use DB;

class Post extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = ['category_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'posts_has_languages')->withPivot('title', 'content', 'slug', 'user_id', 'view')->withTimestamps();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getAllChildByLanguage($category_id, $language)
    {
        $result = [];
        $categories = Category::all();
        $posts = $language->posts()->with('category')->get();
        foreach ($posts as $post) {
            if ($category_id == null || $category_id == 0)
                $result[] = $post->pivot;
            else {
                if ($post->category->id == $category_id)
                    $result[] = $post->pivot;

                // Lấy các bài viết cấp con
                $categoryTree = LoopHelper::dataTree($categories->toArray(), $category_id);
                foreach ($categoryTree as $category) {
                    if ($category['id'] == $post->category->id)
                        $result[] = $post->pivot;
                }

            }
        }

        return $result;
    }

    public function getAmountByCategory($categoryId)
    {
        $categoryModel = new Category();
        $posts = $this->where('category_id', $categoryId)->get();
        $result = count($posts);
        $childIds = $categoryModel->getAllChildId($categoryId);
        if (count($childIds) == 0)
            return count($posts);
        else {
            $childPosts = [];
            for ($i = 0; $i < count($childIds); $i++)
                $childPosts[] = $this->where('category_id', $childIds[$i])->get();
            foreach ($childPosts as $childPost)
                $result += count($childPost);
            return $result;
        }
    }

    public function deleteOne($post_id)
    {
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

    public function getPostsByCategoryId($locale, $categoryId)
    {

        $posts = DB::table('posts_has_languages')
            ->select('posts_has_languages.title', 'categories_has_languages.name', 'posts_has_languages.slug', 'categories.id', 'categories.parent_id')
            ->join('posts', 'posts_has_languages.post_id', '=', 'posts.id')
            ->join('languages', 'posts_has_languages.language_id', '=', 'languages.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('categories_has_languages', function ($join) {
                $join->on('categories_has_languages.category_id', '=', 'categories.id')
                    ->on('categories_has_languages.language_id', '=', 'languages.id');
            })
            ->where('languages.locale', $locale)
            ->get();

        if ($categoryId) {
            $result = DB::table('posts_has_languages')
            ->select('posts_has_languages.title', 'categories_has_languages.name', 'posts_has_languages.slug', 'categories.id', 'categories.parent_id')
            ->join('posts', 'posts_has_languages.post_id', '=', 'posts.id')
            ->join('languages', 'posts_has_languages.language_id', '=', 'languages.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('categories_has_languages', function ($join) {
                $join->on('categories_has_languages.category_id', '=', 'categories.id')
                    ->on('categories_has_languages.language_id', '=', 'languages.id');
            })
            ->where('languages.locale', $locale)
            ->where('categories.id', $categoryId)
            ->get();
            
            foreach ($posts as $post) {
                if($post->parent_id == $categoryId)
                $result->push($post);
            }
            return $result;
        } 
        else return $posts;
    }

    public function updateView()
    {
        $this->pivot->view++;
        $this->pivot->save();
    }
}
