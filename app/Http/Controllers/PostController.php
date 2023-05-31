<?php

namespace App\Http\Controllers;

use App\Helpers\LoopHelper;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Language;
use App\Models\Category;

class PostController extends Controller
{
    public function index(Request $request) {
        $category_id = $request->input('category');
        $title = trans('home.11-period') ?? "Document";

        $locale = app()->getLocale() ?? 'vi';
        $language = Language::where('locale', $locale)->first();
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

        return view('client.post', ['title' => $title, "posts" => $posts]);
    }

    function postDetail($slug) {
        $locale = session('locale') ?? 'vi';
        $language = Language::where('locale', $locale)->first();
        $postFind = $language->posts()->wherePivot('slug', $slug)->first();
        
        $postTitle = $postFind->pivot->title;
        $postContent = $postFind->pivot->content;
        
        $post = ["postTitle" => $postTitle, "postContent" => $postContent];
        $title = $postTitle;

        return view('client.post-detail', ['title' => $title, 'post' => $post, 'category' => $postFind->category->name]);

    }
}
