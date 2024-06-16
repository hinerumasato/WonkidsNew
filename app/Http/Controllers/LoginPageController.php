<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPageController extends Controller
{
    /**
     * Render Login Page
     * @return View
     */
    public function render() {
        return view('client.login', [
            'title' => 'Đăng nhập',
        ]);
    }
}
