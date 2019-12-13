<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = 'Submissions';
	protected $primaryKey = 'Submission_ID';
	public $timestamps = false;
	
}
