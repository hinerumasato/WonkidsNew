<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterPageController extends Controller
{
    public function render() {
        return view('client.register', [
            'title' => 'Đăng ký',
        ]);
    }
}
