<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\mail\AnswerMail;
use Illuminate\Http\Request;
use App\Models\QA;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminQAController extends Controller
{
    public function index() {
        $user = Auth::user();
        $qas = QA::orderBy('id', 'desc')->paginate(4);
        $answered = QA::where('answered', 1)->get();
        $questions = QA::all();
        foreach ($qas as $qa) {
            $time = $qa->created_at->diffForHumans();
            $qa->time = $time;
        }
        return view('admin.qa', ['qas' => $qas, 'user' => $user, 'answered' => $answered, 'questions' => $questions]);
    }

    public function answer($id) {
        $user = Auth::user();
        $qa = QA::find($id);
        return view('admin.answer', ['user' => $user, 'qa' => $qa]);
    }

    public function postAnswer(Request $request, $id) {
        $user = Auth::user();
        $data = $request->title . $request->content;
        $qa = QA::find($id);
        $qa->answered = 1;
        $qa->answered_by = $user->id;
        $qa->token = StringHelper::generateToken($data);
        $qa->save();
        Mail::to($qa->email)->send(new AnswerMail($request->title, $request->content, $qa->token));
        return redirect()->route('admin.qa.index');
    }
}
