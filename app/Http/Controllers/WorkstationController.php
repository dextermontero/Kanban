<?php

namespace App\Http\Controllers;

use App\Models\Colleagues;
use App\Models\Projects;
use App\Models\Workstation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkstationController extends Controller
{
    
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
                return view('kanban.view', compact('data', 'todo', 'progress', 'done'))->with('title', $data->project_name. ' Workstation');
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
