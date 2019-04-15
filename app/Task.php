<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $guarded = [];

	public function project()
	{
		return $this->belongsTo(Project::class);
	}

	public function complete($completed = true)
	{
		return $this->update(compact('completed'));
	}

	public function iscomplete()
	{
		$this->complete(false);
	}
}
