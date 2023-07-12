<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLayoutController extends Controller
{
    public static function index($view) {
        $user = Auth::user();
        $view->with([
            'user' => $user,
        ]);
    }
}
