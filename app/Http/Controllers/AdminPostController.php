<?php

namespace App\Http\Controllers;

use App\Helpers\LoopHelper;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use App\Helpers\StringHelper;

class AdminPostController extends Controller
{
    public function index() {
        $categories = Category::all();
        $categories = LoopHelper::dataTree($categories);
        $languages = Language::all();
        return view('admin.add-post', ["categories" => $categories, "languages" => $languages]);
    }

    public function editIndex($post_id, $language_id) {
        $categories = Category::all();
        $categories = LoopHelper::dataTree($categories);
        $languages = Language::all();
        $post = Post::find($post_id);
        $category_id = $post->category_id;
        $language = $post->languages->where('id', $language_id)->first();
        $title = $language->pivot->title;
        $content = $language->pivot->content;

        $data = [
            "post_id" => $post->id,
            "category_id" => $category_id,
            "language_id" => $language_id,
            "title" => $title,
            "content" => $content,
        ];

        return view('admin.edit-post', ["data" => $data, "categories" => $categories, "languages" => $languages]);
    }
    
    public function postAdd(Request $request) {

        $validate = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ], [
            'title.required' => "Vui lòng nhập tiêu đề",
            'content.required' => "Vui lòng nhập nội dung",
        ]);     

        $title = $request->input("title");
        $content = $request->input("content");
        $category_id = $request->input("category_id");
        $language_id = $request->input("language_id");
        
        Post::create([
            'category_id' => $category_id
        ]);


        $newestPostId = Post::orderBy('id', 'desc')->get()->first()->id;
        $post = Post::find($newestPostId);
        $post->languages()->attach([
            $language_id => [
                "title" => $title, 
                "content" => $content, 
                "slug" => StringHelper::toSlug($title),
            ],
        ]);

        $languages = Language::all();
        foreach($languages as $language) {
            if($language->id != $language_id) {
                $id = $language->id;
                $post->languages()->attach([
                    $id => [
                        "title" => $title, 
                        "content" => "null",
                        "slug" => StringHelper::toSlug($title),
                    ],
                ]);
            }
        }

        return redirect()->route('admin.indexRedirect')->with('msg', trans('general.add-post-success'));
    }

    public function putEdit(Request $request, $post_id, $language_id) {

        $validate = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ], [
            'title.required' => "Vui lòng nhập tiêu đề",
            'content.required' => "Vui lòng nhập nội dung",
        ]);

        $post = Post::find($post_id);
        $title = $request->input('title');
        $content = $request->input('content');
        
        $post->languages()->updateExistingPivot($language_id, [
            "title" => $title,
            "content" => $content,
            "slug" => StringHelper::toSlug($title),
        ]);

        return redirect()->route('admin.indexRedirect')->with('msg', trans('general.edit-post-success'));
    }

    public function delete($post_id) {
        $post = Post::find($post_id);
        $post->languages()->detach();
        return redirect()->route('admin.indexRedirect')->with('msg', trans('general.delete-post-success'));
    }
}
