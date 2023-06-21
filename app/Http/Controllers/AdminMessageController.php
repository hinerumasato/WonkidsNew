<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMessageController extends Controller
{
    public function detail($id) {
        $messageModel = new Message();
        $userModel = new User();

        $user = Auth::user();
        $message = $messageModel->findById($id);
        $isValidMessage = $messageModel->checkValidMessage($user, $message);

        if($isValidMessage) {
            $messageModel->markRead($id);
            $sendUser = $userModel->findById($message->send_id);
            return view('admin.message-detail', [
                'user' => $user,
                'message' => $message,
                'sendUser' => $sendUser,
            ]);
        }

        else abort(403, 'không có quyền truy cập');
    }

    public function postSend(Request $request) {
        $messageModel = new Message();
        $messageModel->create($request->all());
        $messageModel->markAnswered($request->old_message_id);
        return redirect()->back();
    }
}
