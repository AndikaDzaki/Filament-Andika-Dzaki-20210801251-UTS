<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Driver extends Model
{
     use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'vehicles_id',
        'image',
        'nama_driver'

    ];

   public function vehicles()
    {
        return $this->belongsTo(Vehicles::class, 'vehicles_id');
    }
}
