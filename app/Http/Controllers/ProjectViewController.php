<?php

namespace App\Http\Controllers;
use App\Models\Project; // 
use Illuminate\Http\Request;

class ProjectViewController extends Controller
{
  public function index()
{
    $projects = Project::latest()->paginate(10);

    $projects->getCollection()->transform(function($project) {
        if ($project->image) {
            $project->image = asset('storage/' . $project->image);
        }
        return $project;
    });

    return response()->json($projects);
}
}
