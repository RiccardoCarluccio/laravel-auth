<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|max:255",
            "url" => "required",
        ]);
        $project = Project::create($request->all());
        return redirect()->route("admin.projects.index", $project->id);

        $counter =0;
        do {
            $slug = Str::slug($data["title"]) . ($counter > 0 ? "-" . $counter : "");
            $alreadyExists = Post::where("slug", $slug)->first();
            $counter++;
        } while($alreadyExists);
            $data["slug"] = $slug;
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $project = Project::where("slug", $slug)->first();
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
