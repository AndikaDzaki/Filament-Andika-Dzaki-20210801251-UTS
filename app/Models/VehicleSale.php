<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleSale extends Model
{
    protected $fillable = [
        'nama',
        'brand',
        'harga',
        'tahun'
    ];
}
