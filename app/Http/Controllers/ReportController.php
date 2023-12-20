<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Reports;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function indexReport(){
        $count = Projects::leftJoin('colleagues as c', 'c.project_id', 'projects.id')->where('projects.status', 'active')->where('c.member_id', Auth::id())->count();
        $list = Projects::select('projects.uuid', 'projects.project_name', 'projects.description', 'projects.end_date', 'projects.status')->leftjoin('colleagues as c', 'c.project_id', 'projects.id')->where('c.member_id', Auth::id())->get();
        return view('reports.index', compact('list', 'count'))->with('title', 'Project Reports');
    }

    public function viewReport($id){
        $exists = Projects::leftJoin('colleagues as c', 'c.project_id', 'projects.id')->where('projects.uuid', $id)->where('c.member_id', Auth::id())->exists();
        if($exists){
            $data = Projects::select('project_name', 'id', 'uuid')->where('uuid', $id)->first();
            $items = Reports::select('reports.id', 'reports.title', 'reports.description', 'ui.profile_img', 'ui.firstname', 'ui.lastname', 'reports.updated_at')->leftJoin('users_information as ui', 'ui.uid', 'reports.member_id')->where('reports.project_id', $data->id)->orderBy('reports.id', 'DESC')->paginate(15);
            return view('reports.report', compact('data', 'items'))->with('title', $data->project_name.' Reports');
        }
        return redirect()->back();
    }

    public function viewReportItem($id){
        $exists = Reports::leftJoin('colleagues as c', 'c.project_id', 'reports.project_id')->where('reports.id', $id)->where('c.member_id', Auth::id())->exists();
        if($exists){
            $items = Reports::select('p.project_name', 'p.uuid', 'reports.title', 'reports.description', 'reports.images')->leftJoin('projects as p', 'p.id', 'reports.project_id')->where('reports.id', $id)->first();
            return view('reports.reportview', compact('items'))->with('title', ucwords($items->title));
        }
        return redirect()->back();
    }

    public function addReport(Request $request){

        $validator = Validator::make($request->all(), [
            'reportFiles' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($validator->passes()) {
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

        return response()->json([
            'status' => 'error',
            'message' =>$validator->errors()->all()]
        );
    }
}
