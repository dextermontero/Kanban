<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use App\Models\UsersInformation;
use Illuminate\Support\Facades\Mail;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $token = sha1(now());
        $request->validate([
            'firstname' => ['required', 'alpha', 'min:2'],
            'lastname' => ['required', 'alpha', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => 'required',

        ],[
            'firstname.required' => 'The First Name field is required.',
            'lastname.required' => 'The Last Name field is required.',
            'email.required' => 'The Email Address field is required.',
            'password.required' => 'The Password field is required.',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $token,
        ]);

        $userinfo = UsersInformation::create([
            'uid' => $user['id'],
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'position' => 'member'
        ]);
        
        $verify = User::select('email_verified_at')->where('email', $request->email)->first()->email_verified_at;
        if($verify === null){
            Mail::to($request->email)->send(new \App\Mail\RegisterVerify($userinfo, $token));
            return redirect()->route('email.verify', $token);
        }

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
