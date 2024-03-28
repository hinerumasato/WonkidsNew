<?php

namespace App\Http\Controllers;

use App\Breadcumb\Breadcumb;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Language;
use App\Models\Media;
use App\Models\Category;
use App\Models\QA;

class HomeController extends Controller {

    private $categoryModel;
    private $languageModel;
    private $postModel;
    private $mediaModel;
    
    public function __construct() {
        $this->categoryModel = new Category();
        $this->languageModel = new Language();
        $this->postModel = new Post();
        $this->mediaModel = new Media();
    }

    private function getArrayOfNumPosts(): array {
        $map = [];
        $allCategories = Category::all();

        foreach ($allCategories as $category) {
            $id = $category->id;
            $parentId = $category->parent_id;
            $num = $this->categoryModel->getNumberPostsById($id, app()->getLocale());
            $map[$id] = $num;
            if(array_key_exists($parentId, $map)) {
                $old = $map[$parentId];
                $new = $old + $num;
                $map[$parentId] = $new;
            }
        }

        return $map;
    }

    public function index() {
        $title = trans('general.home');
        $languages = Language::all();
        $zones = $this->categoryModel->getOneLevelCategoriesData(app()->getLocale());
        $medias = $this->mediaModel->getAllByLocaleAddSlug(app()->getLocale());
        $wonkidsSong = $medias[0];
        $wonkidsStory = $medias[1];
        $wonkidsCraft = $medias[2];
        $wonkidsMemorize = $medias[3];
        
        return view('client.home', [
            'title' => $title, 
            'languages' => $languages, 
            'zones' => $zones, 
            'wonkidsSong' => $wonkidsSong, 
            'wonkidsStory' => $wonkidsStory, 
            'wonkidsCraft' => $wonkidsCraft, 
            'wonkidsMemorize' => $wonkidsMemorize,
            'postsNumArray' => $this->getArrayOfNumPosts(),
        ]);
    }

    public function aboutUs() {
        $newSmallSliderDescription = trans('wonkidsclub.about');
        $title = trans('general.about-us') ?? "Document";
        $newSmallSliderTitle = $title;

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
            trans('general.club') => route('home.about-us'),
        ], trans('general.about-us'));

        return view('client.about-us', [
            'title' => $title, 
            'newSmallSliderTitle' => $newSmallSliderTitle,
            'newSmallSliderDescription' => $newSmallSliderDescription,
        ]);
    }

    public function management() {
        $title = trans('general.management') ?? "Document";
        $newSmallSliderTitle = $title;

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
            trans('general.club') => route('home.about-us'),
        ], trans('general.management'));

        return view('client.management', [
            'title' => $title, 
            'newSmallSliderTitle' => $newSmallSliderTitle,
        ]);
    }

    public function book() {
        $title = trans('general.book') ?? "Document";
        $newSmallSliderTitle = $title;

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
            trans('general.wonderful-story') => route('home.book'),
        ], trans('general.book'));

        return view('client.book', [
            'title' => $title, 
            'newSmallSliderTitle' => $newSmallSliderTitle,
        ]);
    }

    public function camp() {
        $title = trans('general.camp') ?? "Document";
        $newSmallSliderTitle = $title;

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
            trans('general.wonderful-story') => route('home.book'),
        ], trans('general.camp'));

        return view('client.camp', [
            'title' => $title, 
            'newSmallSliderTitle' => $newSmallSliderTitle,
        ]);
    }

    public function wonkidsclub() {
        $title = trans('general.club') ?? "Document";
        $newSmallSliderTitle = $title;

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
            trans('general.wonderful-story') => route('home.book'),
        ], trans('general.club'));

        return view('client.wonkidsclub', [
            'title' => $title, 
            'newSmallSliderTitle' => $newSmallSliderTitle,
        ]);
    }

    public function postQA(Request $request) {
        QA::create($request->all());
        return back()->with('msg', 'Cảm ơn bạn đã gửi câu hỏi, Câu hỏi của bạn đã được ghi lại');
    }
}
