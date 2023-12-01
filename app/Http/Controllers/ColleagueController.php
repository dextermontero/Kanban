<?php

namespace App\Http\Controllers;

use App\Models\Colleagues;
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
            $lists = Colleagues::select('ui.profile_img', 'ui.firstname', 'ui.lastname', 'ui.position', 'p.status', 'colleagues.id')->leftJoin('projects as p', 'p.id', 'colleagues.project_id')->leftJoin('users_information as ui', 'ui.id', 'colleagues.member_id')->where('p.uuid', $id)->get();
            return view('users.view', compact('data', 'lists'))->with('title', $data.' Management');
        }
    }
}
