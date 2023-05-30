<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class AdminController extends Controller
{

    public function indexRedirect() {
        $locale = app()->getLocale();
        $language = Language::where('locale', $locale)->first();
        $msg = session('msg');
        return redirect()->route('admin.index', ['language_id' => $language->id])->with('msg', $msg);
    }

    public function index($language_id) {
        $languages = Language::all();
        $posts = Language::find($language_id)->posts;
        return view('admin/index', ["languages" => $languages, "posts" => $posts, "language_id" => $language_id]);
    }
}
