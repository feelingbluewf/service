<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarServicesServiceType extends Model
{
    use HasFactory;

    protected $fillable = [
		'id',
		'service_id',
		'point_id',
		'service_type',
		'price',
		'required_time',
		'created_at',
		'updated_at'
	];
}
