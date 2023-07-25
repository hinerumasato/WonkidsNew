<?php

namespace App\Http\Controllers;

use App\Helpers\LocaleHelper;
use App\Helpers\PaginateHelper;
use App\Helpers\StringHelper;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Post;
use App\Models\User;
use App\Rules\OldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{   
    public function index(Request $request) {
        $postModel = new Post();
        $languages = Language::all();
        $languageLocale = $request->input('post_lang') ?? 'vi';

        LocaleHelper::changeLocale($languageLocale);

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
            'path' => route('admin.index', [
                'post_lang' => $languageLocale, 
                'post_category' => $request->input('post_category')
            ]),
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

    public function account() {
        $user = Auth::user();
        $settingTitle = 'Account Setting';
        return view('admin.account', ['user' => $user, 'settingTitle' => $settingTitle]);
    }

    public function password() {
        $user = Auth::user();
        $settingTitle = 'Password Setting';
        return view('admin.password', ['user' => $user, 'settingTitle' => $settingTitle]);
    }

    public function profile() {
        $user = Auth::user();
        return view('admin.profile', ['user' => $user]);
    }

    public function accountPost(Request $request) {
        $userModel = new User();
        $user = Auth::user();

        if($request->has('avatar')) {
            $newAvatar = $request->avatar;
            $oldAvatar = $user->avatar;
            if($oldAvatar != asset('imgs/avatar/default_avatar.png')) {
                $path = StringHelper::getParseUrlPath($oldAvatar);
                File::delete($path);
            }
            $newAvatarName = Str::uuid($newAvatar->getClientoriginalName()) . '.' . $newAvatar->getClientoriginalExtension();
            $newAvatar->move(public_path('uploads/avatars'), $newAvatarName);
            $user->avatar = asset('uploads/avatars/'. $newAvatarName);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->designation = $request->designation;

        $userModel->saveUser($user);


        return redirect()->back();
    }

    public function passwordPost(Request $request) {
        $user = Auth::user();
        $userModel = new User();
        
        $request->validate([
            'old-password' => ['required', new OldPassword($user)],
            'new-password' => ['required', 'confirmed'],
            'new-password_confirmation' => ['required'],
        ]);
        
        $user->password = Hash::make($request->input('new-password'));
        $userModel->saveUser($user);
        return redirect()->back()->with('msg', trans('setting.password.success'));
    }
}
