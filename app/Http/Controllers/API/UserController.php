<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use App\Response\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function getLoginUser(Request $request) {
        $loginUser = Auth::guard('api')->user();
        if($loginUser != null)
            return ResponseFactory::response(200, 'Get login user successfully', $loginUser);
        else return ResponseFactory::response(404, 'Login user not found!');
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if($validator->fails()) {
            return ResponseFactory::response(422, "Dữ liệu không hợp lệ", $validator->errors());
        }
        
        $credentials = request(['email', 'password']);
        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('wonkidsclub')->accessToken;
            return response()->json([
                'statusCode' => 200,
                'message' => 'Đăng nhập thành công',
                'token' => $token,
                'data' => $user,
            ]);
        } else return ResponseFactory::response(404, 'Đăng nhập thất bại');
    }

    public function register(Request $request) {
        $locale = $request->client_locale;
        app()->setLocale($locale);
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'name' => ['required'],
            'birthYear' => ['required'],
            'church' => ['required'],
        ], [
            'email.unique' => trans('validation.unique', ['attribute' => 'email']),
        ]);

        if($validator->fails()) {
            return ResponseFactory::response(422, "Dữ liệu không hợp lệ", $validator->errors());
        }

        $user = new User([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'birth_year' => $request->birthYear,
            'church' => $request->church,
            'phone' => $request->phone,
        ]);

        $user->save();
        $token = $user->createToken('wonkidsclub')->accessToken;
        return response()->json([
            'statusCode' => 200,
            'message' => 'Đăng ký thành công',
            'token' => $token,
            'data' => $user,
        ]);
    }

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

    public function forgotPassword(Request $request) {
        $email = $request->email;
        $locale = $request->locale;
        app()->setLocale($locale);
        $user = User::where('email', $email)->first();
        if($user == null) {
            return response()->json([
                'message' => 'Email không tồn tại',
            ], 404);
        }

        $token = Hash::make($user->email . $user->id . $user->password . Carbon::now());
        // Store to password_resets table
        DB::table('password_resets')->where('email', $email)->delete();
        $inserted = DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        if($inserted) {
            // Send mail
            $mail = new ResetPasswordMail(__('form.reset-password'), $token);
            Mail::to($email)->send($mail);
            return response()->json([
                'message' => __('mail.notification'),
            ], 200);
        } else {
            return response()->json([
                'message' => 'failed',
            ], 404);
        }
        
    }
}
