<?php

namespace App\Http\Controllers\Auth;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{

    

    // Chuyển hướng sang Google
    public function redirect()
    {
        $client = new Client([ 'verify' => base_path('certs/cacert.pem'), ]);
        return Socialite::driver('google')->stateless()->setHttpClient($client)->redirect();
    }

    // Google callback
    public function callback()
    {
        $client = new Client([ 'verify' => base_path('certs/cacert.pem'), ]);
        $googleUser = Socialite::driver('google')->stateless()->setHttpClient($client)->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'USER_NAME' => $googleUser->getName(),
                'EMAIL' => $googleUser->getEmail(),
                'PASSWORD' => bcrypt(Str::random(16)),
                'google_id' => $googleUser->getId(),
                 'role'      => 'user',
            ]);
        }

        Auth::login($user);

        if ($user->role === 'admin' || $user->role === 'superadmin' ) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('shop');
    }
}