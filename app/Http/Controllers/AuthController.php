<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect(Request $request)
    {
        $return_to = request('return_to', url()->previous());
        session()->put('url.intended', $return_to);

        return Socialite::driver('github')->redirect();
    }

    public function callback(Request $request)
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::firstOrCreate(
            [
                'email' => $githubUser->getEmail(),
            ],
            [
                'name' => $githubUser->getName(),
                'email' => $githubUser->getEmail(),
                // 'avatar' => $githubUser->getAvatar(),
            ]
        );

        Auth::login($user);

        return redirect()->intended(route('products.index'));
    }

    public function authAsGuest()
    {
        $user = User::factory()->create();

        Auth::login($user);

        return redirect()->route('products.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('products.index');
    }
}
