<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkstationController extends Controller
{
    
    public function listWorkstation() {
        $count = Projects::where('status', 'active')->count();
        $list = Projects::select('projects.uuid', 'projects.project_name', 'projects.description', 'projects.end_date', 'projects.status')->leftjoin('colleagues as c', 'c.project_id', 'projects.id')->where('c.member_id', Auth::id())->get();
        return view('kanban.index', compact('list', 'count'))->with('title', 'Workstation Lists');
    }

    public function viewWorkstation($id){
        $data = Projects::where('uuid', $id)->first();
        return view('kanban.view', compact('data'))->with('title', $data->project_name. ' Workstation');
    }
}
