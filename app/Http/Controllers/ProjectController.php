<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $urls = Project::all();
        $table_id = $request->get('table_id');

        return view('projects.index', compact('urls', 'table_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $table_id = $request->get('table_id');
        return view('projects.create', compact('table_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'link' => 'required',
            'table_id' => 'required',
            'hw' => 'required',
            'ch' => 'required',
            'hr' => 'required'
        ]);

        Project::create($request->all());
        $table_id = $request->get('table_id');

        return redirect()->route('projects.index', ['table_id' => $table_id])
            ->with('success', 'Link added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Project $project)
    {
        $table_id = $request->get('table_id');
        return view('projects.show', compact('project','table_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Request $request)
    {
        $table_id = $request->get('table_id');
        return view('projects.edit', compact('project', 'table_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        $request->validate([
            'link' => 'required',
            'hw' => 'required',
            'ch' => 'required',
        ]);
        $project->update($request->all());

        $table_id = $request->get("table_id");

        return redirect()->route('projects.index', ['table_id' => $table_id])
            ->with('success', 'Link details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Request $request)
    {

        $project->delete();
        $table_id = $request->get('table_id');

        return redirect()->back()
            ->with('success', 'Link deleted successfully');
    }
}
