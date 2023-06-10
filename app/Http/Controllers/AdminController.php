<?php

namespace App\Http\Controllers;

use App\Helpers\LoopHelper;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    
    public function index(Request $request) {
        $languages = Language::all();
        $languageLocale = $request->input('post_lang') ?? 'vi';
        $post_category_id = $request->input('post_category') ?? 0;
        $languageId = Language::where('locale', $languageLocale)->first()->id;
        $language = Language::where('locale', $languageLocale)->first();
        $categories = Language::where('locale', $languageLocale)->first()->categories;
        $posts = [];

        if($post_category_id == 0) {
            $temp = Language::where('locale', $languageLocale)->first()->posts;
            foreach ($temp as $post) {
                $posts[] = $post->pivot;
            }
        }
        else {

            //Lấy ra tất cả các bài viết con
            foreach($language->posts as $post) {
                if($post_category_id == null)
                    $posts[] = $post->pivot;
                    else {
    
                        if($post->category->id == $post_category_id)
                            $posts[] = $post->pivot;
    
                        $tempCategories = Category::all(); 
                        $categoryTree = LoopHelper::dataTree($tempCategories->toArray(), $post_category_id);
                        foreach ($categoryTree as $category) {
                            if($category['id'] == $post->category->id)
                                $posts[] = $post->pivot;
                        }
        
                    }
                }
        }
        $user = Auth::user();
        $msg = session('msg');
        return view('admin.index', [
                "languageId" => $languageId, 
                "languages" => $languages, 
                "posts" => $posts, 
                "languageLocale" => $languageLocale, 
                "post_category_id" => $post_category_id,
                "categories" => $categories,
                "user" => $user
            ])
                ->with('msg', $msg);
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
            if($oldAvatar != asset('imgs/avatar/default_avatar.png')) {
                $path = parse_url($oldAvatar, PHP_URL_PATH);
                $path = substr($path, 1);
                File::delete($path);
            }
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
