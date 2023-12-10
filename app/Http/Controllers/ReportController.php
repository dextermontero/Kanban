<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Reports;
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
        $data = Projects::select('project_name', 'id', 'uuid')->where('uuid', $id)->first();
        return view('reports.report', compact('data'))->with('title', $data->project_name.' Reports');
    }

    public function viewReportItem($id){
        return view('reports.reportview')->with('title', 'Project Reports');
    }

    public function addReport(Request $request){
        $imagesFile = [];
        if($request->totalImages > 0){
            for($i = 0; $i < $request->totalImages; $i++){
                if($request->hasFile('files'.$i)){
                    $file = $request->file('files' . $i);
                    $name = $request->uuid.'_'.time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('assets/projects/reports'), $name);
                    $imagesFile[$i] = $name;
                }
            }

            $img = implode(',', $imagesFile);

            $report = Reports::create([
                'project_id' => $request->id,
                'member_id' => Auth::id(),
                'title' => $request->report,
                'description' => $request->description,
                'images' => $img
            ]);

            if($report->save()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Add Report Successfully'
                ]);
            }else{
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Something went wrong! Contact administrator',
                ]);
            }
        }else{
            $report = Reports::create([
                'project_id' => $request->id,
                'member_id' => Auth::id(),
                'title' => $request->report,
                'description' => $request->description,
                'images' => ''
            ]);
            if($report->save()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Add Report Successfully'
                ]);
            }else{
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Something went wrong! Contact administrator',
                ]);
            }
        }
    }
}
