<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class ProjectsController extends Controller
{
	public function index()
	{
		$projects = Project::all();
		return view('projects.index', compact('projects'));
	}

	public function show(Project $project)
	{
		//$project = Project::findOrFail($id);
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

		Project::create($attributes);
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
		$project->delete();
		return redirect('/projects');
	}
}
