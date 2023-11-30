<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function emailNotice(){
        return view('email-verify');
    }

    public function resendEmail(Request $request){
        $token = sha1(now());
        $exists = User::where(['remember_token' => $request->get('id')])->exists();
        if($exists){
            $status = User::select('email_verified_at')->where('remember_token', $request->get('id'))->first()->email_verified_at;
            if($status === null){
                User::where('remember_token', $request->get('id'))->update(['remember_token' => $token]);
                $user = User::select('ui.firstname', 'ui.lastname', 'users.email', 'users.remember_token')->leftJoin('users_information as ui', 'ui.uid', 'users.id')->where('users.remember_token', $token)->first();
                Mail::to($user->email)->send(new \App\Mail\RegisterVerify($user->firstname, $user->lastname, $user->email, $user->remember_token));
                return response()->json([
                    'status' => 'success',
                    'message' => 'Resend Successfully. Check your Mail ',
                    'url' => route('email.notice', $user->remember_token)
                ]);
            }
            return response()->json([
                'status' => 'info',
                'message' => 'The account was already verified',
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Your token is invalid, Login to get new verification link',
        ]);
    }

    public function verified($id){
        $checkID = User::where('remember_token', $id)->exists();

        if($checkID){
            $status = User::select('email_verified_at')->where('remember_token', $id)->first()->email_verified_at;
            if($status === null){
                User::where('remember_token', $id)->update(['email_verified_at' => now(), 'remember_token' => null]);
                return redirect()->route('home')->with('success', 'Account successfully verified!');
            }
            return redirect()->route('home')->with('info', 'Account was already verified');
        }
        return redirect()->route('home')->with('info', 'Invalid email verification token');
    }
}
