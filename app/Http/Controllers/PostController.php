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
