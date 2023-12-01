<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

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
            return view('users.view', compact('data'))->with('title', $data.' Management');
        }
    }
}
