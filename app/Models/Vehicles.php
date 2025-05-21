<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\Crypt;

class Vehicles extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'vehicles';


    protected $fillable = [
        'nama_kendaraan',
        'merk',
        'warna',
        'no_polisi'
    ];

    protected $encrypted = [
        'no_polisi',
    ];

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encrypted) && !is_null($value)) {
            $value = Crypt::encryptString($value);
        }

        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encrypted) && !is_null($value)) {
            try {
                return Crypt::decryptString($value);
            } catch (\Exception $e) {
                return $value;
            }
        }

        return $value;
    }

    public function driver()
    {
        return $this->hasMany(Driver::class, 'vehicles_id');
    }




}
