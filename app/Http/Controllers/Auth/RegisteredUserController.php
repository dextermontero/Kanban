<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function store(Request $request)
    {
        $token = sha1(now());
        $exists = User::where(['email' => $request->get('email')])->exists();
        if(!$exists){
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => $token,
            ]);
    
            $userinfo = UsersInformation::create([
                'uid' => $user['id'],
                'firstname' => $request->firstname,
                'lastname' => $request->firstname,
                'email' => $request->email,
                'position' => 'member'
            ]);
    
            if($user){
                Mail::to($request->email)->send(new \App\Mail\RegisterVerify($userinfo['firstname'], $userinfo['lastname'], $userinfo['email'], $token));
                return response()->json([
                    'status' => 'success',
                    'message' => 'Creating Account Successfully, Please wait...',
                    'url' => route('email.notice', $token),
                ]);
            }
        }
        return response()->json([
            'status' => 'error',
            'message' => 'The email address has already taken!',
        ]);
    }
}
