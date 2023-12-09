<?php

namespace App\Http\Controllers;

use App\Models\Colleagues;
use App\Models\Projects;
use App\Models\UsersInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $chkPosition = UsersInformation::select('position')->where('id', Auth::id())->first()->position;

        if($chkPosition === 'member'){
            return redirect()->route('auth.listWorkstation');
        }else{
            $pCount = Projects::where('status', 'active')->count(); // Project Count active
            $mCount = Colleagues::where('status', 'active')->count(); // Member Count
            $cCount = Projects::where('status', 'done')->count(); // Project Count Complete
            $prjLists = Projects::select('uuid', 'project_name', 'status')->addSelect(DB::raw("(SELECT COUNT(*) FROM workstations where item_status = 'done' and project_id = projects.id) as complete"))->where('status', 'active')->addSelect(DB::raw("(SELECT COUNT(*) FROM workstations WHERE project_id = projects.id) as task_total"))->where('status', 'active')->get();
            return view('dashboard.index', compact('pCount', 'mCount', 'cCount', 'prjLists'))->with('title', 'Dashboard');
        }
    }
}
