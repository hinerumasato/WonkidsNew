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

    private $smallSliderTitle;

    public function __construct()
    {
        $this->smallSliderTitle = 'Document';   
    }

    public function index() {

        $languageModel = new Language();
        $categoryModel = new Category();
        $postModel = new Post();
        $mediaModel = new Media();


        $title = trans('general.home');
        $languages = $languageModel->all();
        $zones = $categoryModel->getOneLevelCategories();
        $zonesNames = [];
        $zonesAmounts = [];

        foreach ($zones as $zone) {
            $zonesNames[] = $categoryModel->getName($zone["id"]);
            $zonesAmounts[] = $postModel->getAmountByCategory($zone["id"]);
        }

        $medias = $mediaModel->getAllByLocaleAddSlug(app()->getLocale());
        $wonkidsSong = $medias[0];
        $wonkidsStory = $medias[1];
        $wonkidsCraft = $medias[2];
        $wonkidsMemorize = $medias[3];
        
        return view('client.home', compact(
            'title', 
            'languages', 
            'zones', 
            'zonesNames', 
            'zonesAmounts', 
            'wonkidsSong', 
            'wonkidsStory', 
            'wonkidsCraft', 
            'wonkidsMemorize',
        ));
    }

    public function aboutUs() {
        $title = trans('general.about-us') ?? "Document";
        $this->smallSliderTitle = $title;

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
            trans('general.club') => route('home.about-us'),
        ], trans('general.about-us'));

        return view('client.about-us', [
            'title' => $title, 
            'smallSliderTitle' => $this->smallSliderTitle,
        ]);
    }

    public function management() {
        $title = trans('general.management') ?? "Document";
        $this->smallSliderTitle = $title;

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
            trans('general.club') => route('home.about-us'),
        ], trans('general.management'));

        return view('client.management', [
            'title' => $title, 
            'smallSliderTitle' => $this->smallSliderTitle,
        ]);
    }

    public function book() {
        $title = trans('general.book') ?? "Document";
        $this->smallSliderTitle = $title;

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
            trans('general.wonderful-story') => route('home.book'),
        ], trans('general.book'));

        return view('client.book', [
            'title' => $title, 
            'smallSliderTitle' => $this->smallSliderTitle,
        ]);
    }

    public function camp() {
        $title = trans('general.camp') ?? "Document";
        $this->smallSliderTitle = $title;

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
            trans('general.wonderful-story') => route('home.book'),
        ], trans('general.camp'));

        return view('client.camp', [
            'title' => $title, 
            'smallSliderTitle' => $this->smallSliderTitle,
        ]);
    }

    public function wonkidsclub() {
        $title = trans('general.club') ?? "Document";
        $this->smallSliderTitle = $title;

        Breadcumb::createBreadcumb('>', [
            trans('home.title') => route('home.index'),
            trans('general.wonderful-story') => route('home.book'),
        ], trans('general.club'));

        return view('client.wonkidsclub', [
            'title' => $title, 
            'smallSliderTitle' => $this->smallSliderTitle,
        ]);
    }

    public function postQA(Request $request) {
        QA::create($request->all());
        return back()->with('msg', 'Cảm ơn bạn đã gửi câu hỏi, Câu hỏi của bạn đã được ghi lại');
    }
}
