<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectApiController extends Controller
{
    public function getAllProjectsByAPI(){
        $show = Projects::all();

        return response()->json([
            "projects" => $show
        ]);
    }
}
