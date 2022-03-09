<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
//        $user = Socialite::driver('google')->stateless()->user();
//        dd($user->getEmail());

        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if ($user) {
            auth()->loginUsingId($user->id);
        } else {
            $newUser = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
//                'phone' => $googleUser->phone,
                'password' => bcrypt(\Str::random(16)),
            ]);
            auth()->loginUsingId($newUser->id);
        }
        return "payam";
    }
}
