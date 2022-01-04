<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Model\User;
use App\Model\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use App\Notifications\PasswordResetSuccess;
use App\Notifications\VerifyEmail;


class ResetPasswordController extends Controller
{
    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
         ],
         [
            'email.required'=>'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa đăng nhập đúng định dạng email',
         ]);

        $user = User::where('email', $request->email)->first();
        if (!$user)
            return response()->json([
                "message" => "We can't find a user with that e-mail address."
            ], 404);
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => str_random(60)
            ]
        );
        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token));
        }
    return response()->json([
        'message' => 'We have e-mailed your password reset link!'
    ]);


    }
    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)
            ->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        }
        return response()->json($passwordReset);
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
         ]);

        $passwordReset = PasswordReset::where([
           
            ['email', $request->email],
            ['token', $request->token],
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        $user = User::where('email', $passwordReset->email)->first();

        if (!$user)
            return response()->json([
                "message" => "We find a user with that e-mail address."], 404);
        $user->password = app('hash')->make($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        return response()->json($user);

    }
}
