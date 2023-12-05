<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Colleagues;
use App\Models\Projects;
use App\Models\UsersInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    private $uuid;
    
    public function __construct()
    {
        $this->uuid = now()->timestamp;
    }

    public function listProjects(){ // auth.php
        $checkID = UsersInformation::select('position')->where('id', Auth::id())->first()->position;

        if($checkID === 'member'){
            return redirect()->route('auth.listWorkstation');
        }else{
            $show = Projects::all();
            $projCount = Projects::where('status', 'active')->count();
            return view('projects.index', compact('show', 'projCount'))->with('title', 'Project Lists');
        }
    }

    public function viewProject($id){ // auth.php
        $exists = Projects::where('uuid', $id)->exists();
        if($exists){
            $checkID = UsersInformation::select('position')->where('id', Auth::id())->first()->position;
            if($checkID === 'member'){
                return redirect()->route('auth.listWorkstation');
            }else{
                $data = Projects::where('uuid', $id)->first();
                $members = UsersInformation::select('users_information.profile_img', 'users_information.firstname', 'users_information.lastname', 'users_information.position', 'users_information.status')->join('colleagues as C', 'C.member_id', 'users_information.uid')->where('project_id', $data->id)->get();
                return view('projects.view', compact('data', 'members'))->with('title', $data->project_name);
            }
        }else{
            return redirect()->route('auth.projects')->with('error', 'The Project didn\'t exists data');
        }
    }

    public function create(Request $request){ // auth.php create projects
        $projects = Projects::create([
            'uuid' => $this->uuid,
            'project_name' => $request->project_name,
            'description' => 'asdas',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        if($projects->save()){
            Colleagues::create([
                'project_id' => $projects['id'],
                'member_id' => Auth::id()
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Add Project Successfully',
            ]);
        }else{
            return response()->json([
                'status' => 'invalid',
                'message' => 'Add project failed! Please try again',
            ]);
        }
    }

    public function removeProject(Request $request){

        $project = Projects::where('id', $request->id)->delete();
        $colleague = Colleagues::where('project_id', $request->id)->delete();

        if($project && $colleague){
            return response()->json([
                'status' => 'success',
                'message' => 'Remove Project Successfully',
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Remove Project Failed! Please try again...',
            ]);
        }
    }
}
