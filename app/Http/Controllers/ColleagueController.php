<?php

namespace App\Http\Controllers;

use App\Models\Colleagues;
use App\Models\Invitation;
use App\Models\Projects;
use App\Models\User;
use App\Models\UsersInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ColleagueController extends Controller
{
    public function indexMember(){
        $count = Projects::where('status', 'active')->count();
        $list = Projects::all();
        return view('users.index', compact('list', 'count'))->with('title', 'Project Management');
    }

    public function manageMember($id){

        $exists = Projects::where('uuid', $id)->exists();
        if($exists){
            $data = Projects::where('uuid', $id)->first()->project_name;
            $lists = Colleagues::select('ui.profile_img', 'ui.firstname', 'ui.lastname', 'ui.position', 'ui.status', 'ui.uid')->leftJoin('users_information as ui', 'ui.uid', 'colleagues.member_id')->leftJoin('projects as p', 'p.id', 'colleagues.project_id')->where('p.uuid', $id)->get();
            return view('users.view', compact('data', 'lists'))->with('title', $data.' Management');
        }
    }

    public function invite(Request $request){
        $exists = Invitation::where('email', $request->email)->exists();
        if(!$exists){
            $hash = sha1(now());
            $getProject = Colleagues::select('project_id')->where('member_id', Auth::id())->first()->project_id;
            $invite = Invitation::create([
                'email' => $request->email,
                'project_id' => $getProject,
                'hash' => $hash
            ]);

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make('p@ssw0rd123'),
                'on_invite' => 1,
                'status' => 'pending',
                'remember_token' => $hash
            ]);

            if($invite->save() && $user->save()){
                $user_info = UsersInformation::create([
                    'uid' => $user['id'],
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'position' => 'member',
                    'status' => 'pending'
                ]);

                $cowork = Colleagues::create([
                    'project_id' => $getProject,
                    'member_id' => $user['id'],
                    'status' => 'pending'
                ]);

                if($user_info->save() && $cowork->save()){
                    //Mail::to($request->email)->send(new \App\Mail\InviteMember($request->firstname, $request->lastname, $request->email, $hash));
                    return response()->json([
                        'status' => 'success',
                        'message' => 'The email address has been sent an invitation!',
                    ]);
                }else{
                    return response()->json([
                        'status' => 'warning',
                    'message' => 'Something went wrong! Contact administrator',
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Something went wrong! Contact administrator',
                ]);
            }
        }else{
            return response()->json([
                'status' => 'info',
                'message' => 'The email address was already invited!',
            ]);
        }
    }
}
