<?php

namespace App\Http\Controllers;

use App\Models\Colleagues;
use App\Models\Projects;
use App\Models\UsersInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $prjLists = Projects::where('status', 'active')->get(); // Display all Projects
            return view('dashboard.index', compact('pCount', 'mCount', 'cCount', 'prjLists'))->with('title', 'Dashboard');
        }
    }
}
