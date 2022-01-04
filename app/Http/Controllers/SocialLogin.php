<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Session;
use App\Model\UserSocial;
use Illuminate\Support\Facades\Auth;
class SocialLogin extends Controller
{
    public function __invoke($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function handerredirct($provider){
        $socialiteProfile = Socialite::driver($provider)->user();
        $user = UserSocial::where('email', $socialiteProfile->email)->first();
        $data = [
            'name' => $socialiteProfile->name,
            'email' => $socialiteProfile->email,
            'avatar_url' => optional($user)->avatar_url ? $user->avatar_url : $socialiteProfile->avatar,
            'social_id' => $socialiteProfile->id,
            'social_provider'=> $provider
        ];
        $user = UserSocial::updateOrCreate(['email' => $socialiteProfile->email], $data);
        Auth::login($user, true);

        return redirect();
    }
}
