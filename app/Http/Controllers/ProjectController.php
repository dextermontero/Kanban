<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $uuid;

    public function __construct()
    {
        $this->uuid = now()->timestamp;
    }

    public function showProjects(){
        $show = Projects::all();

        return view('projects.index', compact('show'))->with('title', 'Project Lists');
    }

    public function create(ProjectRequest $request){
        $create = $request->validated();

        Projects::create([
            'uuid' => $this->uuid,
            'project_name' => $create['projectname'],
            'description' => $create['description'],
            'start_date' => $create['startDate'],
            'end_date' => $create['endDate'],
        ]);

        return redirect()->route('auth.projects');
    }
}
