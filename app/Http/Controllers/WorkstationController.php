<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class WorkstationController extends Controller
{
    
    public function listWorkstation() {
        $count = Projects::where('status', 'active')->count();
        $list = Projects::all();
        return view('kanban.index', compact('list', 'count'))->with('title', 'Workstation Lists');
    }

    public function viewWorkstation($id){


        return view('kanban.view')->with('title', 'asdasdas');
    }
}
