<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Mail\ProjectCreated;

class ProjectsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$projects = Project::where('owner_id', auth()->id())->get();
		return view('projects.index', compact('projects'));
	}

	public function show(Project $project)
	{
		//$project = Project::findOrFail($id);
		//abort_if($project->owner_id !== auth()->id(), 403);
		//$this->authorize('update', $project);
		return view('projects.show', compact('project'));
	}

	public function create()
	{
		return view ('projects.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'title' => ['required', 'min:3'],
			'description' => ['required', 'min:3']
		]);

		$attributes['owner_id'] = auth()->id();

		$project = Project::create($attributes);
		/* Project::create(
			request()->validate([
				'title' => ['required','min:3'],
				'description' => ['required','min:3']
			])
		);
		*/
		//$project = new Project();

		//$project->title = request('title');
		//$project->description = request('description');

		//$project->save();

		\Mail::to('cavazos.ma@gmail.com')->send(
			new ProjectCreated($project)
		);

		return redirect('/projects');
	}

	public function edit(Project $project)
	{
		//$project = Project::findOrFail($id);
		return view('projects.edit', compact('project'));
	}

	public function update(Project $project)
	{
		//$project = Project::findOrFail($id);
		//$this->authorize('update', $project);
		$project->update(request(['title','description']));
		/*
		$project->title = request('title');
		$project->description = request('description');

		$project->save();
		*/
		return redirect('/projects');
	}

	public function destroy(Project $project)
	{
		//Project::findOrFail($id)->delete();
		//$this->authorize('update', $project);
		$project->delete();
		return redirect('/projects');
	}
}
