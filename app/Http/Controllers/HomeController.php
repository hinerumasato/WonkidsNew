<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Language;

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
}
