<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMemberController extends Controller
{

    public function index() {
        $user = Auth::user();

        $members = User::all();

        return view('admin.member', ['user' => $user, 'members' => $members]);
    }
}
