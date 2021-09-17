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
        if ($redirect_to = request('redirect_to')) {
            $request->session()->put('redirect_to', $redirect_to);
        }

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

        if ($request->session()->has('redirect_to')) {
            $redirect_to = $request->session()->get('redirect_to');
            $request->session()->forget('redirect_to');
            return redirect($redirect_to);
        } else {
            return redirect()->route('products.index');
        }

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
