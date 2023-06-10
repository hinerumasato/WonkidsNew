<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminMemberController extends Controller
{

    public function index() {
        $user = Auth::user();
        $members = User::all();
        $roles = Role::all();

        return view('admin.member', ['user' => $user, 'members' => $members, 'roles' => $roles]);
    }

    public function postAddMember(Request $request) {
        $validation = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:1'],
            'phone' => ['required', 'min:10', 'unique:users'],
        ]);

        if($validation->fails()) {
            return back()->with('fail', 'fail')->withInput()->withErrors($validation->errors());
        }

        $avatar = asset('imgs/avatar/default_avatar.png');
        $user = User::create($request->all());
        $user->avatar = $avatar;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = date('Y-m-d H:i:s', time());
        $user->save();
        return back()->with('msg', 'Add new member successfully');
    }

    public function postSendMessage(Request $request) {
        Message::create($request->all());
        return redirect()->back()->with('msg', 'Your message was send successfully');
    }

}
