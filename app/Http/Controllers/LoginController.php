<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
class LoginController extends Controller
{
    public function loginVk() {
        return Socialite::with('vkontakte')->redirect();
    }

    public function respVk(UserRepository $userRepository) {
        if (Auth::id()){
            return redirect()->route('home');
        }
        $user = Socialite::driver('vkontakte')->user();
        //dd($user);
        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);
        return redirect()->route('home');
    }

}
