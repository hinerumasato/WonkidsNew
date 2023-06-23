<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Language;
use App\Models\QA;

class HomeController extends Controller {

    private $smallSliderTitle;

    public function __construct()
    {
        $this->smallSliderTitle = 'Document';   
    }

    public function index() {
        $title = trans('general.home') ?? "Document";
        $this->smallSliderTitle = $title;
        return view('client.home', [
            'title' => $title, 
            'smallSliderTitle' => $this->smallSliderTitle,
        ]);
    }

    public function aboutUs() {
        $title = trans('general.about-us') ?? "Document";
        $this->smallSliderTitle = $title;
        return view('client.about-us', [
            'title' => $title, 
            'smallSliderTitle' => $this->smallSliderTitle,
        ]);
    }

    public function operation() {
        $title = trans('general.operation') ?? "Document";
        $this->smallSliderTitle = $title;
        return view('client.operation', [
            'title' => $title, 
            'smallSliderTitle' => $this->smallSliderTitle,
        ]);
    }

    public function book() {
        $title = trans('general.book') ?? "Document";
        $this->smallSliderTitle = $title;
        return view('client.book', [
            'title' => $title, 
            'smallSliderTitle' => $this->smallSliderTitle,
        ]);
    }

    public function camp() {
        $title = trans('general.camp') ?? "Document";
        $this->smallSliderTitle = $title;
        return view('client.camp', [
            'title' => $title, 
            'smallSliderTitle' => $this->smallSliderTitle,
        ]);
    }

    public function wonkidsclub() {
        $title = trans('general.wonkidsclub') ?? "Document";
        $this->smallSliderTitle = $title;
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
