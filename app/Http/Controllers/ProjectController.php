<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\{Request,RedirectResponse};
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('projects.index',['projects'=>Project::with('user')->latest()->get()]);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'contribution' => 'required|string|max:255',
            'repository' => 'required|string|max:255',
            'preview' => 'required|string|max:255',
        ]);
 
        $request->user()->projects()->create($validated);
 
        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project):View
    {
        return view('projects.show', ['project' => $project]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project):View
    {
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project):RedirectResponse
    {
        $this->authorize('update',$project);
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'contribution' => 'required|string|max:255',
            'repository' => 'required|string|max:255',
            'preview' => 'required|string|max:255',
        ]);
 
        $project->update($validated);
 
        return redirect(route('projects.show', $project));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project):RedirectResponse
    {
        $this->authorize('delete',$project);
        $project->delete();
 
        return redirect(route('projects.index'));
    }
}
