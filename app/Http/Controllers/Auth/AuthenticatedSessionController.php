<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('welcome');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],[
            'email.required' => 'The email address field is required',
            'password.required' => 'The password field is required',
        ]);


        $checkEmail = User::where('email', $request->email)->exists();
        if($checkEmail){
            $verify = User::select('email_verified_at', 'remember_token')->where('email', $request->email)->first();
            if($verify->email_verified_at === null){
                return redirect()->route('email.notice', $verify->remember_token);
            }else{
                if(Auth::guard('web')->attempt($credentials)){
                    $request->session()->regenerate();
                    return redirect()->intended(RouteServiceProvider::HOME);
                }
                return redirect()->route('home')->with('error', 'Incorrect Credentials. Please try again!');
            }
        }

        return redirect()->route('home')->with('info', 'Invalid account credentials!');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
