<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index(Request $request) {
        $languages = Language::all();
        $languageLocale = $request->input('post_lang') ?? 'vi';
        $languageId = Language::where('locale', $languageLocale)->first()->id;
        $posts = Language::where('locale', $languageLocale)->first()->posts;
        $user = Auth::user();
        $msg = session('msg');
        return view('admin.index', ["languageId" => $languageId, "languages" => $languages, "posts" => $posts, "languageLocale" => $languageLocale, "user" => $user])->with('msg', $msg);
    }

    public function setting() {
        $user = Auth::user();
        return view('admin.setting', ['user' => $user]);
    }

    public function profile() {
        $user = Auth::user();
        return view('admin.profile', ['user' => $user]);
    }

    public function settingPost(Request $request) {
        $user = Auth::user();

        if($request->has('avatar')) {
            $newAvatar = $request->avatar;
            $oldAvatar = $user->avatar;
            $path = parse_url($oldAvatar, PHP_URL_PATH);
            $path = substr($path, 1);
            File::delete($path);
            $newAvatarName = $newAvatar->getClientoriginalName();
            $newAvatar->move(public_path('uploads/avatars'), $newAvatarName);
            $user->avatar = asset('uploads/avatars/'. $newAvatarName);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->designation = $request->designation;
        $user->save();
        return redirect()->back();
    }
}
