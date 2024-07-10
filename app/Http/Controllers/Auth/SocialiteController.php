<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {

        // Logout pengguna terlebih dahulu untuk memastikan mereka harus memilih akun lagi
        Auth::logout();

        // URL redirect untuk Google dengan parameter prompt
        $googleRedirectUrl = Socialite::driver('google')->redirect()->getTargetUrl();

        // Menambahkan parameter prompt untuk memaksa Google menampilkan layar pemilihan akun
        $googleRedirectUrl .= '&prompt=select_account';

        return redirect($googleRedirectUrl);

        return redirect($googleRedirectUrl);
    }

    public function callback()
    {
        $socialUser = Socialite::driver('google')->user();

        // Cari user dengan google_id tersebut
        $registeredUser = User::where('google_id', $socialUser->id)->first();

        if ($registeredUser) {
            // Jika user dengan google_id sudah ada, langsung login
            Auth::login($registeredUser);
        } else {
            // Cari user dengan email tersebut
            $userWithEmail = User::where('email', $socialUser->email)->first();

            if ($userWithEmail) {
                // Jika user dengan email tersebut sudah ada, tambahkan google_id dan token
                $userWithEmail->update([
                    'google_id' => $socialUser->id,
                    'google_token' => $socialUser->token,
                    'google_refresh_token' => $socialUser->refreshToken,
                ]);

                Auth::login($userWithEmail);
            } else {
                // Jika user dengan email tersebut tidak ada, buat user baru
                $user = User::create([
                    'google_id' => $socialUser->id,
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'password' => Hash::make('123'), // Password default atau Anda bisa membuatnya lebih kompleks
                    'google_token' => $socialUser->token,
                    'google_refresh_token' => $socialUser->refreshToken,
                ]);

                Auth::login($user);
            }
        }

        return redirect('/home');
    }
}
