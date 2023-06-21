<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request) {
        $userModel = new User();
        $user = $userModel->find($request->id);
        
        if($user != null) {
            $user->update($request->all());
            return response()->json([
                'message' => 'Bạn đã cập nhật người dùng thành công, đóng thông báo này ở nút Close',
            ], 200);
        }
        else {
            return response()->json([
                'message' => 'failed'
            ], 404);
        }

    }
}
