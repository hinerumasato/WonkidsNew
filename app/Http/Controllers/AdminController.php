<?php

namespace App\Http\Controllers;

use App\Helpers\PaginateHelper;
use App\Helpers\StringHelper;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    
    public function index(Request $request) {
        $postModel = new Post();
        $languages = Language::all();
        $languageLocale = $request->input('post_lang') ?? 'vi';
        $post_category_id = $request->input('post_category') ?? 0;
        $languageId = Language::where('locale', $languageLocale)->first()->id;
        $language = Language::where('locale', $languageLocale)->first();
        $categories = Language::where('locale', $languageLocale)->first()->categories;
        $posts = $postModel->getAllChildByLanguage($post_category_id, $language);

        if($request->has('search')) {
            $searchPosts = [];
            $search = $request->search;
            foreach ($posts as $post) {
                $searchLower = StringHelper::toSlug($search);
                $titleLower = StringHelper::toSlug($post->title);
                if(str_contains($titleLower, $searchLower))
                    $searchPosts[] = $post;
            }

            $posts = $searchPosts;
        }

        $posts = PaginateHelper::paginate($posts, 10, null, [
            'path' => route('admin.index'),
        ]);

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

        $user->update($request->all());

        return redirect()->back();
    }
}
