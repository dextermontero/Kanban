<?php

namespace App\Http\Controllers;

use App\Models\Colleagues;
use App\Models\Invitation;
use App\Models\Projects;
use App\Models\RecentLog;
use App\Models\User;
use App\Models\UsersInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ColleagueController extends Controller
{
    public function indexMember(){
        $count = Projects::leftJoin('colleagues as c', 'c.project_id', 'projects.id')->where('projects.status', 'active')->where('c.member_id', Auth::id())->count();
        $list = Projects::select('projects.uuid', 'projects.project_name', 'projects.description', 'projects.end_date', 'projects.status')->leftjoin('colleagues as c', 'c.project_id', 'projects.id')->where('c.member_id', Auth::id())->get();
        return view('users.index', compact('list', 'count'))->with('title', 'Project Management');
    }

    public function manageMember($id){
        $exists = Projects::where('uuid', $id)->exists();
        if($exists){
            $data = Projects::select('project_name', 'id')->where('uuid', $id)->first();
            $lists = Colleagues::select('ui.profile_img', 'ui.firstname', 'ui.lastname', 'ui.position', 'ui.status', 'ui.uid')->leftJoin('users_information as ui', 'ui.uid', 'colleagues.member_id')->leftJoin('projects as p', 'p.id', 'colleagues.project_id')->where('p.uuid', $id)->get();
            return view('users.view', compact('data', 'lists'))->with('title', $data->project_name.' Management');
        }else{
            return redirect()->route('auth.organization')->with('error', 'The Project didn\'t exists data');
        }
    }

    public function invite(Request $request){
        $exists = Invitation::where('email', $request->email)->exists();
        if(!$exists){
            $hash = sha1(now());
            $project = Projects::select('id', 'project_name')->where('uuid', $request->uuid)->first();
            $invite = Invitation::create([
                'email' => $request->email,
                'project_id' => $project->id,
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
                    'project_id' => $project->id,
                    'member_id' => $user['id'],
                    'status' => 'pending'
                ]);

                if($user_info->save() && $cowork->save()){
                    $inviter = UsersInformation::select(DB::raw('CONCAT(firstname, \' \', lastname) as fullname'))->where('uid', Auth::id())->first()->fullname;
                    $projectName = Projects::select('project_name')->where('id', $project->id)->first()->project_name;
                    Mail::to($request->email)->send(new \App\Mail\InviteMember($inviter, $projectName, $request->firstname, $request->lastname, $request->email, $hash));

                    RecentLog::create([
                        'project_id' => $project->id,
                        'title' => 'Member Invitation',
                        'task' =>  $inviter.' sent an email invitation to '.ucwords($request->firstname).' '.ucwords($request->lastname),
                    ]);
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

    public function searchMember(Request $request){
        $listUser = User::select('users.id', 'ui.profile_img', 'ui.firstname', 'ui.lastname', 'ui.position')->leftjoin('users_information as ui', 'ui.uid', 'users.id')->get();

        $prjID = Colleagues::select('colleagues.member_id')->leftjoin('projects as p', 'p.id', 'colleagues.project_id')->where('p.uuid', $request->id)->get();

        if($request->search !== ''){
            $listUser = User::select('users.id', 'ui.profile_img', 'ui.firstname', 'ui.lastname', 'ui.position')->leftjoin('users_information as ui', 'ui.uid', 'users.id')->where('ui.firstname', 'iLIKE', '%'.$request->search.'%')->orWhere('ui.lastname', 'iLIKE', '%'.$request->search.'%')->orWhere('ui.email', 'iLIKE', '%'.$request->search.'%')->get();
        }

        return response()->json([
            'projectID' => $prjID,
            'users' => $listUser
        ]);
    }

    public function addMember(Request $request){
        $projectId = Projects::select('id')->where('uuid', $request->id)->first()->id;

        $c = Colleagues::create([
            'project_id' => $projectId,
            'member_id' => $request->userID,
            'status' => 'active'
        ]);

        if($c->save()){
            $fullname = UsersInformation::select(DB::raw('CONCAT(firstname, \' \', lastname) as fullname'))->where('uid', Auth::id())->first()->fullname;
            $target = UsersInformation::select(DB::raw('CONCAT(firstname, \' \', lastname) as fullname'))->where('uid', $request->userID)->first()->fullname;
            RecentLog::create([
                'project_id' => $projectId,
                'title' => 'Member Invitation',
                'task' =>  $fullname.' sent invitation to '.ucwords($target),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Add member successfully'
            ]);
        }else{
            return response()->json([
                'status' => 'warning',
                'message' => 'Something went wrong! Contact administrator',
            ]);
        }
    }

    public function removeMember(Request $request){

        $remove = Colleagues::where('member_id', $request->uid)->where('project_id', $request->id)->delete();
        if($remove === 1){
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully remove member'
            ]);
        }else{
            return response()->json([
                'status' => 'warning',
                'message' => 'Something went wrong! Contact administrator',
            ]);
        }
    }
}
