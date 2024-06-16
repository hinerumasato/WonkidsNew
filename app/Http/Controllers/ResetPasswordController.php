<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ResetPasswordController extends Controller
{
    //
    public function render(Request $request) {
        $token = $request->token;
        if ($token == null) {
            abort(400, 'Token is missing');
            return;
        }

        $isTokenValid = DB::table('password_resets')->where('token', $token)->first();
        if ($isTokenValid == null) {
            abort(400, 'Token is invalid');
            return;
        }

        return view('client.reset', ['token' => $token, 'title' => __('auth.form.reset-password')]);
    }

    public function reset(Request $request) {
        // Validate password and passwordConfirmation field
        $request->validate([
            'password' => 'required|min:6',
            'passwordConfirmation' => 'required|same:password',
        ]);

        // Check if token is valid
        $token = $request->token;
        $isTokenValid = DB::table('password_resets')->where('token', $token)->first();
        if ($isTokenValid == null) {
            abort(400, 'Token is invalid');
            return;
        }

        // Update password
        $email = $isTokenValid->email;
        DB::table('users')->where('email', $email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where('token', $token)->delete();
        return redirect()->route('auth.login-page')->with('success', 'Password reset successfully');
    }
}
