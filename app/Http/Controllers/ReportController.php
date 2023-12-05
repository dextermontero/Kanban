<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function indexReport(){
        $count = Projects::where('status', 'active')->count();
        $list = Projects::select('projects.uuid', 'projects.project_name', 'projects.description', 'projects.end_date', 'projects.status')->leftjoin('colleagues as c', 'c.project_id', 'projects.id')->where('c.member_id', Auth::id())->get();
        return view('reports.index', compact('list', 'count'))->with('title', 'Project Reports');
    }

    public function viewReport($id){
        $data = Projects::where('uuid', $id)->first()->project_name;
        return view('reports.report', compact('data'))->with('title', $data.' Reports');
    }

    public function viewReportItem($id){
        return view('reports.reportview')->with('title', 'Project Reports');
    }
}
