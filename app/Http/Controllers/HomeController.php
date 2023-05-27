<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Language;

class HomeController extends Controller {

    public function index() {
        $title = trans('home.title') ?? "Document";
        return view('home', compact('title'));
    }

    public function aboutUs() {
        $title = trans('home.title') ?? "Document";
        return view('about-us', compact('title'));
    }

    public function operation() {
        $title = trans('home.title') ?? "Document";
        return view('operation', compact('title'));
    }
}
