<?php

namespace App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class SocialLoginController extends Controller
{
    //
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function processLoginFacebook(){
        $facebookUser = Socialite::driver('facebook')->stateless()->user();
        if (!$facebookUser){
            return ;
        }
        $systemUser = User::where('facebook_id',$facebookUser->id)->first();
        if (!$systemUser){
            $systemUser = User::create([
                'name' => $facebookUser->name,
                'username' => 'fb_'.$facebookUser->nickname,
                'email' => $facebookUser->email ?? 'abc@gmail.com',
                'password' => Hash::make('shiba'.$facebookUser->expiresIn),
                'facebook_id' => $facebookUser->id,
            ]);
        }
        Auth::login($systemUser);
        return redirect('/home');
    }
}

