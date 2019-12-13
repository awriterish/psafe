<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'Responses';
	protected $primaryKey = 'Response_ID';
	public $timestamps = false;
}
