<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	// Fillable field to make work the static method create to let us make mass assignment
	protected $fillable = [
		'title', 'description'
	];
	//Also, the guard does the same but in a inverse fashion, 'accept this fields, except this stored in the array guard'
	//protected $guarded = [];
}
