<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Language;

class PostController extends Controller
{

    public function index() {
        $title = trans('home.11-period') ?? "Document";

        $locale = session('locale') ?? 'vi';
        $language = Language::where('locale', $locale)->first();
        $posts = [];

        foreach($language->posts as $post) {
            $posts[] = $post->pivot;
        }


        return view('post', ['title' => $title, "posts" => $posts]);
    }

    function postDetail($id) {
        $locale = session('locale') ?? 'vi';
        $language = Language::where('locale', $locale)->first();
        $postFind = $language->posts->where('id', $id)->first();
        
        $postTitle = $postFind->pivot->title;
        $postContent = $postFind->pivot->content;
        
        $post = ["postTitle" => $postTitle, "postContent" => $postContent];
        $title = $postTitle;

        return view('post-detail', ['title' => $title, 'post' => $post, 'category' => $postFind->category->name]);

    }
}
