<?php

namespace App\Http\Controllers;

use App\Models\RecentLog;
use App\Models\User;
use App\Models\UsersInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{

    public function home() {
        return view('welcome');
    }

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
                
                RecentLog::create([
                    'title' => 'Email Verification',
                    'task' => 'Resend verification was succussfully by '.ucwords($user->firstname).' '.ucwords($user->lastname),
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Resend Successfully. Check your Mail',
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


    public function getInvite($id){
        $chkHash = User::where('remember_token', $id)->exists();

        if($chkHash){
            $info = User::select('ui.firstname', 'ui.lastname', 'ui.email', 'ui.position', 'project.project_name')->leftJoin('users_information as ui', 'ui.uid', 'users.id')
                ->join(DB::raw("(SELECT p.project_name, i.hash FROM projects as p left join invitations as i on i.project_id = p.id) as project"), function($join){
                    $join->on('project.hash', '=', 'users.remember_token');
                })->where('users.remember_token', $id)->first();
            return view('invite', compact('info'));
        }else{
            return redirect()->route('home')->with('info', 'Invalid Invitation Linked');
        }
    }

    public function completeInvite(Request $request){
        $chkHash = User::where('remember_token',$request->id)->exists();

        if($chkHash){
            $getID = User::select('id')->where('remember_token', $request->id)->first()->id;
            $updateUInfo = UsersInformation::where('uid', $getID)->update(['status' => 'active']);
            $updateUser = User::where('id', $getID)->update(['password'=> Hash::make($request->password),'email_verified_at' => now(), 'on_invite' => 0, 'status' => 'active', 'remember_token' => null]);
            if($updateUInfo === 1 && $updateUser === 1){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Successfully setup invitation! Please wait...',
                    'url' =>  route('home')
                ]);
            }else{
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Something went wrong! Contact administrator',
                ]);
            }
        }else{
            return response()->json([
                'status' => 'info',
                'message' => 'Invalid Invitation Linked',
            ]);
        }
    }
}
