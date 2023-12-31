<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RecentLog;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    public function store(Request $request)
    {

        $chkExists = User::where('email', $request->email)->exists();

        if($chkExists){
            $chkInvite = User::select('on_invite')->where('email', $request->email)->first()->on_invite;
            if($chkInvite === 1){
                return response()->json([
                    'status' => 'info',
                    'message' => 'This email address was invited, Check your mail!',
                ]);
            }else{
                $newToken = sha1(now());
                $chkVerify = User::select('email_verified_at')->where('email', $request->email)->first()->email_verified_at;

                if($chkVerify === null){
                    User::where('email', $request->email)->update(['remember_token' => $newToken]);
                    $user = User::select('ui.firstname', 'ui.lastname', 'users.email', 'users.remember_token')->leftJoin('users_information as ui', 'ui.uid', 'users.id')->where('users.remember_token', $newToken)->where('users.email', $request->email)->first();
                    Mail::to($user->email)->send(new \App\Mail\RegisterVerify($user->firstname, $user->lastname, $user->email, $user->remember_token));
                    return response()->json([
                        'status' => 'verify',
                        'message' => 'Resend Successfully. Check your Mail',
                        'url' => route('email.notice', $user->remember_token),
                    ]);
                }else{
                    if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])){
                        $request->session()->regenerate();
                        RecentLog::create([
                            'title' => 'Account Login',
                            'task' => $request->email.' was successfully login',
                        ]);

                        return response()->json([
                            'status' => 'success',
                            'message' => 'Login Successfully, Please wait...',
                        ]);
                    }else{
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Incorrect password! Please try again...',
                        ]);
                    }
                }
            }
        }else{
            return response()->json([
                'status' => 'info',
                'message' => 'Account doesn\'t exists!',
            ]);
        }
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
