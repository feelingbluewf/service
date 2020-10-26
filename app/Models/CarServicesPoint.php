<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarServicesPoint extends Model
{
	use HasFactory;

	protected $fillable = [
		'id',
		'city',
		'service_id',
		'address',
		'post_code',
		'car_brands',
		'start_time',
		'end_time',
		'policy',
		'created_at',
		'updated_at'
	];

	public function employees() {
		return $this->hasMany('App\Models\CarServicesEmployee', 'point_id', 'id');
	}

	public function serviceType() {
		return $this->hasMany('App\Models\CarServicesServiceType', 'point_id', 'id');
	}

	public function details() {
		return $this->belongsTo('App\Models\CarServicesDetail', 'id', 'service_id');
	}
}
