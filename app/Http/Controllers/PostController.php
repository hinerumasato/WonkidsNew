<?php

namespace App\Http\Controllers;

use App\Breadcumb\Breadcumb;
use App\Helpers\LoopHelper;
use App\Helpers\PaginateHelper;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Language;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller {
    
    public function index(Request $request) {

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
        ], trans('general.11zones'));
        
        $languageModel = new Language();
        $postModel = new Post();

        $title = trans('general.11zones') ?? "Document";
        $newSmallSliderTitle = $title;
        $category_id = $request->input('category');
        $locale = app()->getLocale() ?? 'vi';
        $language = $languageModel->findByLocale($locale);
        $posts = $postModel->getAllChildByLanguage($category_id, $language);
        if($category_id) {
            $posts = PaginateHelper::paginate($posts, 20, null, [
                'path' => route('posts.index') . '?category='. $category_id,
            ]);
        }
        

        return view('client.post', [
                'title' => $title, 
                "posts" => $posts,
                'newSmallSliderTitle' => $newSmallSliderTitle,
            ]
        );
    }

    function postDetail($slug) {

        $postModel = new Post();

        $locale = session('locale') ?? 'vi';
        $language = Language::where('locale', $locale)->first();
        $postFind = $language->posts()->wherePivot('slug', $slug)->first();

        if($postFind == null) {
            $languages = Language::all();
            foreach ($languages as $language) {
                foreach ($language->posts as $post ) {
                    if($post->pivot->slug == $slug) {
                        $newSlug = $post->languages()->where('locale', $locale)->first()->pivot->slug;
                        return redirect()->route('posts.post-detail', ['slug' => $newSlug]);
                    }
                }
            }

        }

        $posts = $postModel->getAllChildByLanguage($postFind->category->id, $language);
        
        $postTitle = $postFind->pivot->title;
        $postContent = $postFind->pivot->content;
        $postTime = $postFind->pivot->updated_at->format('Y-m-d');
        $postAuthor = User::find($postFind->pivot->user_id);
        $postView = $postFind->pivot->view + 1;

        $postFind->updateView();

        $category = $postFind->category->languages()->where('locale', $locale)->first()->pivot->name;
        
        $post = [
            "postTitle" => $postTitle, 
            "postContent" => $postContent, 
            "postTime" => $postTime,
            "postAuthor" => $postAuthor->name,
            "postView" => $postView,
        ];
        $title = $postTitle;
        $newSmallSliderTitle = trans('general.11zones') ?? "Document";


        $postDetailCategoryId = $postFind->category->id;

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
            trans('general.11zones') => route('posts.index'),
        ], $category);

        return view('client.post-detail', [
                'title' => $title, 
                'post' => $post, 
                'category' => $category,
                'smallSliderTitle' => $newSmallSliderTitle,
                'postDetailCategoryId' => $postDetailCategoryId,
                'posts' => $posts,
            ]);

    }
}
