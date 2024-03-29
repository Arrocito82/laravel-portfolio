<?php

namespace App\Http\Controllers;
use App\Models\Chirp;
use Illuminate\Http\{Request, Response,RedirectResponse};
use Illuminate\View\View;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('chirps.index',['chirps'=>Chirp::with('user')->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'message'=>'required|string|max:255',
            'parent_id'=>'exists:chirps,id',
            'project_id'=>'exists:projects,id',
        ]);
        $request->user()->chirps()->create($validatedData);
        return redirect(route('projects.show', $request->project_id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp):View
    {
        $this->authorize('update',$chirp);
        return view('chirps.edit',['chirp'=>$chirp]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update',$chirp);
        $validatedData=$request->validate([
            'message'=>'required|string|max:255',
        ]);
        $chirp->update($validatedData);
        return redirect(route('projects.show', $chirp->project_id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp): RedirectResponse
    {
        $this->authorize('delete',$chirp);
        $chirp->delete();
        return redirect(route('projects.show', $chirp->project_id));
    }

}
