<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordPageController extends Controller
{
    //
    public function render() {
        return view('client.forgot', [
            'title' => __('auth.forgot-password'),
        ]);
    }
}
