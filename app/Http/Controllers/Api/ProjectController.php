<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project; 
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
$projects = Project::latest()->paginate(10);
 $projects->getCollection()->transform(function ($project) {
        $project->image = $project->image ? url('storage/'.$project->image) : null;
        return $project;
    });
    return response()->json($projects); // this is correct
    }

   public function store(Request $request)
{
    try {
        // Validate input
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technology' => 'nullable|string',
            'github_link' => 'nullable|string',
            'tags' => 'nullable',
            'image' => 'nullable|image'
        ]);

        // Decode tags if sent as JSON
        if ($request->has('tags')) {
            $data['tags'] = json_decode($request->tags, true);
        }

        // Store image in public storage
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $data['image'] = $path; // store relative path
        }

        // Create project
        $project = Project::create($data);

        // Add full image URL for frontend
        $project->image_url = $project->image ? asset('storage/'.$project->image) : null;

        // Return full project info
        return response()->json([
            'success' => true,
            'id' => $project->id,
            'project' => $project
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'DB Error: '.$e->getMessage()
        ], 500);
    }
}
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);

        $validatedData = $request->validate();

        // Fix: Update also needs to decode tags!
        if ($request->has('tags') && is_string($request->tags)) {
            $validatedData['tags'] = json_decode($request->tags, true);
        }

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validatedData = $request->file('image')->store('projects', 'public');
        }

        $project->update($validatedData);

        return response()->json($project);
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return response()->json(['message' => 'Deleted']);
    }
    public function projview(){

    }
}
