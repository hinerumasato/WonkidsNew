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
    public function index(Request $request) {
        $languageLocale = $request->input('post_lang') ?? 'vi';
        $language = Language::where('locale', $languageLocale)->first();
        $categories = $language->categories;
        $categoriesArr = LoopHelper::filterCategory($categories);
        $categories = LoopHelper::dataTree($categoriesArr);
        $languages = Language::all();
        return view('admin.add-post', ["categories" => $categories, "languages" => $languages, "languageLocale" => $languageLocale]);
    }

    public function editIndex($post_id, $language_id) {
        $categories = Language::find($language_id)->categories;
        $categoriesArr = LoopHelper::filterCategory($categories);
        $categories = LoopHelper::dataTree($categoriesArr);
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
        $language_locale = $request->input("language_locale");
        $language_id = Language::where('locale', $language_locale)->first()->id;
        
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

        return redirect()->route('admin.index')->with('msg', trans('general.add-post-success'));
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
        $locale = Language::find($language_id)->locale;
        
        $post->languages()->updateExistingPivot($language_id, [
            "title" => $title,
            "content" => $content,
            "slug" => StringHelper::toSlug($title),
        ]);

        $redirectUrl = route('admin.index').'/?post_lang='.$locale;

        return redirect($redirectUrl)->with('msg', trans('general.edit-post-success'));
    }

    public function deleteOne($post_id) {
        $post = Post::find($post_id);
        $post->languages()->detach();
        return redirect()->route('admin.index')->with('msg', trans('general.delete-post-success'));
    }

    public function deleteMany(Request $request) {
        $idsStr = explode(",", $request->postIds);
        $ids = array_map(function($str) {
            return intval($str); 
        }, $idsStr);

        foreach ($ids as $id) {
            $post = Post::find($id);
            $post->languages()->detach();
        }
        return redirect()->route('admin.index')->with('msg', trans('general.delete-post-success'));
    }
}
