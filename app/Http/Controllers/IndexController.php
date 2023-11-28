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

        $checkID = User::where('remember_token', $request->token)->exists();

        if($checkID){
            $user = User::select('ui.firstname', 'ui.lastname', 'users.email', 'users.remember_token')->leftJoin('users_information as ui', 'ui.uid', 'users.id')->where('users.remember_token', $request->token)->first();
            Mail::to($user->email)->send(new \App\Mail\RegisterVerify($user->firstname, $user->lastname, $user->email, $user->remember_token));
            return redirect()->route('email.notice', $user->remember_token)->with('success', 'Resend verification successfully!');
        }
        return redirect()->back()->with('info', 'Invalid Token');
    }

    public function verified($id){
        $checkID = User::where('remember_token', $id)->exists();

        if($checkID){
            $status = User::select('email_verified_at')->where('remember_token', $id)->first()->email_verified_at;
            if($status === null){
                User::where('remember_token', $id)->update(['email_verified_at' => now()]);
                return redirect()->route('home')->with('success', 'Account successfuly verified!');
            }
            return redirect()->route('home')->with('info', 'Account was already verified');
        }
        return redirect()->route('home')->with('info', 'Invalid Token');
    }
}
