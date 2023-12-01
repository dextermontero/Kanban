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
        $checkID = UsersInformation::select('position')->where('id', Auth::id())->first()->position;

        if($checkID === 'member'){
            return redirect()->route('auth.listWorkstation');
        }else{
            $exists = Projects::where('uuid', $id)->exists();
            if($exists){
                $data = Projects::where('uuid', $id)->first();
                $members = UsersInformation::select('profile_img', 'firstname', 'lastname', 'position')->join('colleagues as C', 'C.member_id', 'users_information.uid')->where('project_id', $data->id)->get();
                return view('projects.view', compact('data', 'members'))->with('title', $data->project_name);
            }
            return redirect()->route('auth.projects')->with('error', 'The Project didn\'t exists data');
        }
    }

    public function create(ProjectRequest $request){ // auth.php create projects
        $create = $request->validated();

        $projects = Projects::create([
            'uuid' => $this->uuid,
            'project_name' => $create['projectname'],
            'description' => $create['description'],
            'start_date' => $create['startDate'],
            'end_date' => $create['endDate'],
        ]);

        Colleagues::create([
            'project_id' => $projects['id'],
            'member_id' => Auth::id()
        ]);

        return redirect()->route('auth.projects')->with('success', 'Add Projects Successfuly');
    }
}
