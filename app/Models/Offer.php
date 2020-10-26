<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
    	'order_id',
    	'service_id',
    	'point_id',
    	'service_type',
    	'price',
    	'start',
    	'finish',
    	'is_submitted',
    	'is_autoaccepted',
    	'created_at',
    	'updated_at'
    ];

    public function order() {
    	return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }

    public function point() {
    	return $this->belongsTo('App\Models\CarServicesPoint', 'point_id', 'id');
    }
}
