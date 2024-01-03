<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Reports;
use App\Models\Comments;
use App\Models\UsersInformation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // Display All Projects
    public function indexReport(){
        $count = Projects::leftJoin('colleagues as c', 'c.project_id', 'projects.id')->where('projects.status', 'active')->where('c.member_id', Auth::id())->count();
        $list = Projects::select('projects.uuid', 'projects.project_name', 'projects.description', 'projects.end_date', 'projects.status')->leftjoin('colleagues as c', 'c.project_id', 'projects.id')->where('c.member_id', Auth::id())->get();
        return view('reports.index', compact('list', 'count'))->with('title', 'Project Reports');
    }
    // View All Reports By UUID of Projects
    public function viewReport($id){
        $exists = Projects::leftJoin('colleagues as c', 'c.project_id', 'projects.id')->where('projects.uuid', $id)->where('c.member_id', Auth::id())->exists();
        if($exists){
            $data = Projects::select('project_name', 'id', 'uuid')->where('uuid', $id)->first();
            $items = Reports::select('reports.id', 'reports.title', 'reports.description', 'ui.profile_img', 'ui.firstname', 'ui.lastname', 'reports.updated_at')->leftJoin('users_information as ui', 'ui.uid', 'reports.member_id')->where('reports.project_id', $data->id)->orderBy('reports.id', 'DESC')->paginate(15);
            return view('reports.report', compact('data', 'items'))->with('title', $data->project_name.' Reports');
        }
        return redirect()->back();
    }
    // View Report Item by Report ID
    public function viewReportItem($id){
        $exists = Reports::leftJoin('colleagues as c', 'c.project_id', 'reports.project_id')->where('reports.id', $id)->where('c.member_id', Auth::id())->exists();
        if($exists){
            $items = Reports::select('p.project_name', 'p.uuid', 'reports.id', 'reports.title', 'reports.description', 'reports.images')->leftJoin('projects as p', 'p.id', 'reports.project_id')->where('reports.id', $id)->first();
            $profile = UsersInformation::select('profile_img', 'firstname', 'lastname')->where('uid', Auth::id())->first();
            $comments = Comments::select('ui.profile_img', 'ui.firstname', 'ui.lastname', 'reports_comment.comment', 'reports_comment.created_at')->leftJoin('users_information as ui', 'ui.uid', 'reports_comment.member_id')->where('reports_comment.report_id', $items->id)->orderBy('reports_comment.id', 'DESC')->get();
            return view('reports.reportview', compact('items', 'profile', 'comments'))->with('title', ucwords($items->title));
        }
        return redirect()->back();
    }
    // Add Reports
    public function addReport(Request $request){

        $validator = Validator::make($request->all(), [
            'reportFiles' => 'image|mimes:jpeg,png,jpg'
        ]);

        if ($validator->passes()) {
            $imagesFile = [];
            if($request->totalImages > 0){
                for($i = 0; $i < $request->totalImages; $i++){
                    if($request->hasFile('files'.$i)){
                        $file = $request->file('files' . $i);
                        $ext = strtolower($file->getClientOriginalExtension());
                        if($ext === "png" || $ext === "jpg" || $ext === "jpeg"){
                            $name = $request->uuid.'_'.time().'_'.$file->getClientOriginalName();
                            $file->move(public_path('assets/projects/reports'), $name);
                            $imagesFile[$i] = $name;
                        }
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
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! Contact administrator',
            ]);
        }
    }

    // Post a comment on Report Item by ID
    public function PostComment(Request $request){
        $comments = $request->validate([
            'comment' => ['required', 'min:2', 'string']
        ]);

        Comments::create([
            'report_id' => $request->report_id,
            'member_id' => Auth::id(),
            'comment' => $comments['comment']
        ]);

        return redirect()->route('auth.report.item', $request->report_id);
    }
}
