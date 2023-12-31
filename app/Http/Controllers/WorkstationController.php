<?php

namespace App\Http\Controllers;

use App\Models\Colleagues;
use App\Models\Projects;
use App\Models\RecentLog;
use App\Models\UsersInformation;
use App\Models\Workstation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkstationController extends Controller
{

    private $fullname;

    public function fullname(){
        $this->fullname = UsersInformation::select(DB::raw('CONCAT(firstname, \' \', lastname) as fullname'))->where('uid', Auth::id())->first()->fullname;
    }

    public function listWorkstation() {
        $count = Projects::leftJoin('colleagues as c', 'c.project_id', 'projects.id')->where('projects.status', 'active')->where('c.member_id', Auth::id())->count();
        $list = Projects::select('projects.uuid', 'projects.project_name', 'projects.description', 'projects.end_date', 'projects.status')->leftjoin('colleagues as c', 'c.project_id', 'projects.id')->where('c.member_id', Auth::id())->get();
        return view('kanban.index', compact('list', 'count'))->with('title', 'Workstation Lists');
    }

    public function viewWorkstation($id){
        $exists = Projects::where('uuid', $id)->exists();
        if($exists){
            $checkID = Colleagues::leftjoin('projects as p', 'p.id', 'colleagues.project_id')->where('p.uuid', $id)->where('colleagues.member_id', Auth::id())->exists();
            if($checkID){
                $data = Projects::select('id', 'project_name', 'end_date')->where('uuid', $id)->first();
                $todo = Workstation::select('id', 'task_name', 'description', 'item_status', 'status')->where('project_id', $data->id)->where('item_status', 'todo')->inRandomOrder()->get();
                $progress = Workstation::select('id', 'task_name', 'description', 'item_status', 'status')->where('project_id', $data->id)->where('item_status', 'progress')->inRandomOrder()->get();
                $done = Workstation::select('id', 'task_name', 'description', 'item_status', 'status')->where('project_id', $data->id)->where('item_status', 'done')->inRandomOrder()->get();
                $cowork = Colleagues::select('colleagues.id', 'ui.profile_img', 'ui.firstname', 'ui.lastname')->leftJoin('users_information as ui', 'ui.uid', 'colleagues.member_id')->where('colleagues.project_id', $data->id)->inRandomOrder()->limit(4)->get();
                return view('kanban.view', compact('data', 'todo', 'progress', 'done', 'cowork'))->with('title', $data->project_name. ' Workstation');
            }else{
                return redirect()->route('auth.listWorkstation');
            }
        }else{
            return redirect()->route('auth.listWorkstation')->with('error', 'The Project didn\'t exists data');
        }
    }

    public function addTask(Request $request){

        $task = Workstation::create([
            'project_id' => $request->id,
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->priority
        ]);

        if($task->save()){
            $fullname = UsersInformation::select(DB::raw('CONCAT(firstname, \' \', lastname) as fullname'))->where('uid', Auth::id())->first()->fullname;
            RecentLog::create([
                'project_id' => $request->id,
                'title' => $request->task_name,
                'task' => 'Task was added successfully by '. $fullname,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Add Task Successfully',
            ]);
        }else{
            return response()->json([
                'status' => 'warning',
                'message' => 'Something went wrong! Contact administrator',
            ]);
        }
    }

    public function updateTask(Request $request){

        $update = Workstation::where('id', $request->id)->update(['item_status' => $request->status]);
        if($update === 1){
            $fullname = UsersInformation::select(DB::raw('CONCAT(firstname, \' \', lastname) as fullname'))->where('uid', Auth::id())->first()->fullname;
            $recent = Workstation::select('project_id', 'task_name')->where('id', $request->id)->first();
            RecentLog::create([
                'project_id' => $recent->project_id,
                'title' => $recent->task_name,
                'task' => 'Task was moved successfully by '. $fullname,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Add Task Successfully',
            ]);
        }else{
            return response()->json([
                'status' => 'warning',
                'message' => 'Something went wrong! Contact administrator',
            ]);
        }
    }
}
