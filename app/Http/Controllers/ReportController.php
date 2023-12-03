<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function indexReport(){
        $count = Projects::where('status', 'active')->count();
        $list = Projects::all();
        return view('reports.index', compact('list', 'count'))->with('title', 'Project Reports');
    }

    public function viewReport($id){
        return view('reports.report')->with('title', 'Project Reports');
    }

    public function viewReportItem($id){
        return view('reports.reportview')->with('title', 'Project Reports');
    }
}
