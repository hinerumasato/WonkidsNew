<?php

namespace App\Http\Controllers;

use App\Helpers\LoopHelper;
use App\Helpers\PaginateHelper;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Language;
use App\Models\Category;

class PostController extends Controller {

    private $smallSliderTitle;

    public function __construct()
    {
        $this->smallSliderTitle = "Document";
    }
    
    public function index(Request $request) {

        $languageModel = new Language();
        $postModel = new Post();

        $title = trans('general.11zones') ?? "Document";
        $this->smallSliderTitle = $title;
        $category_id = $request->input('category');
        $locale = app()->getLocale() ?? 'vi';
        $language = $languageModel->findByLocale($locale);
        $posts = $postModel->getAllChildByLanguage($category_id, $language);
        if($category_id) {
            $posts = PaginateHelper::paginate($posts, 4, null, [
                'path' => route('posts.index') . '?category='. $category_id,
            ]);
        }
        

        return view('client.post', [
                'title' => $title, 
                "posts" => $posts,
                'smallSliderTitle' => $this->smallSliderTitle,
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

        $category = $postFind->category->languages()->where('locale', $locale)->first()->pivot->name;
        
        $post = ["postTitle" => $postTitle, "postContent" => $postContent];
        $title = $postTitle;
        $this->smallSliderTitle = trans('general.11zones') ?? "Document";


        $postDetailCategoryId = $postFind->category->id;

        return view('client.post-detail', [
                'title' => $title, 
                'post' => $post, 
                'category' => $category,
                'smallSliderTitle' => $this->smallSliderTitle,
                'postDetailCategoryId' => $postDetailCategoryId,
                'posts' => $posts,
            ]);

    }
}
