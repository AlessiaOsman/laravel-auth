<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('created_at')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project;
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $request->validate(
            [
                'title' => ['required', 'string', Rule::unique('projects')->ignore($project->id)],
                'content' => 'required|string',
                'url' => 'required|url:http,https'
            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.unique' => 'Non possono esistere più progetti con lo stesso titolo',
                'content.required' => 'La descrizione è obbligatoria',
                'url.required' => 'L\'indirizzo di riferimento è obbligatorio',
                'url.url' => 'L\'url inserito non è corretto'
            ]); 

        $data = $request->all();
        $project = new Project;
        $project->fill($data);
        $project->slug = Str::slug($project->title);
        $project->save();

        return to_route('adminprojects.show', $project)->with('message', 'Nuovo progetto inserito con successo')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate(
        [
            'title' => 'required|string|unique:projects',
            'content' => 'required|string',
            'url' => 'required|url:http,https'
        ],
        [
            'title.required' => 'Il titolo è obbligatorio',
            'title.unique' => 'Non possono esistere più progetti con lo stesso titolo',
            'content.required' => 'La descrizione è obbligatoria',
            'url.required' => 'L\'indirizzo di riferimento è obbligatorio',
            'url.url' => 'L\'url inserito non è corretto'
        ]);

        $data = $request->all();
        $project->fill($data);
        $project->slug = Str::slug($data['title']);
        $project->save();
        return to_route('adminprojects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('adminprojects.index')->with('type', 'danger')->with('message', 'Progetto eliminato con successo');
    }
}
