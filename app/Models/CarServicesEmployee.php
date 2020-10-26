<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarServicesEmployee extends Model
{
	use HasFactory;

	protected $fillable = [
		'id',
		'service_id',
		'point_id',
		'name',
		'created_at',
		'updated_at'
	];
}
