<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Language;
use App\Models\QA;

class HomeController extends Controller {

    public function index() {
        $title = trans('home.title') ?? "Document";
        return view('client.home', compact('title'));
    }

    public function aboutUs() {
        $title = trans('home.title') ?? "Document";
        return view('client.about-us', compact('title'));
    }

    public function operation() {
        $title = trans('home.title') ?? "Document";
        return view('client.operation', compact('title'));
    }

    public function book() {
        $title = trans('home.title') ?? "Document";
        return view('client.book', ['title' => $title]);
    }

    public function camp() {
        $title = trans('home.title') ?? "Document";
        return view('client.camp', ['title' => $title]);
    }

    public function wonkidsclub() {
        $title = trans('home.title') ?? "Document";
        return view('client.wonkidsclub', ['title' => $title]);
    }

    public function postQA(Request $request) {
        QA::create($request->all());
        return back()->with('msg', 'Cảm ơn bạn đã gửi câu hỏi, Câu hỏi của bạn đã được ghi lại');
    }
}
