<?php

namespace App\Http\Controllers;

use App\Models\QA;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function success($token) {
        $qa = QA::where('token', $token)->first();
        $qa->solved = 1;
        $qa->save();
        return redirect()->route('home.index');
    }

    public function decline($token) {
        $qa = QA::where('token', $token)->first();
        $qa->answered = 0;
        $qa->save();
        return redirect()->route('home.index');
    }
}
