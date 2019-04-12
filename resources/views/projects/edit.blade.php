@extends('layout')

@section('content')
	<h1 class="title" style="margin-top: 1em;">Edit Project page</h1>

	<form method="POST" action="/projects/{{ $project->id }}" style="margin-bottom: 1em;">
		<!-- {{ method_field('PATCH') }}-->
		<!-- {{ csrf_field() }}-->
    @method('DELETE')
    @csrf


		<div class="field">
			<label class="label" for="title">Title</label>

			<div class="control">
				<input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
			</div>
		</div>

		<div class="field">
			<label class="label" for="description">Description</label>

			<div class="control">
				<textarea name="description" class="textarea">{{ $project->description }}</textarea>
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Update Project</button>
			</div>
		</div>
	</form>

	<form method="POST" action="/projects/{{ $project->id }}">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}

		<div class="field">
                        <div class="control">
                                <button type="submit" class="button">Delete Project</button>
                        </div>
                </div>
	</form>
@endsection
