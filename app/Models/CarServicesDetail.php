<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarServicesDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'service_id',
        'name',
        'registration_number',
        'vat_number',
        'address',
        'post_code',
        'bank_account_number',
        'created_at',
        'updated_at'
    ];
}
