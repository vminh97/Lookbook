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
            $user->notify(new LetterRegister());       
    return response()->json([
        'message' => 'We have e-mailed your password reset link!'
    ]);


    }

}
