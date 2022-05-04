<?php

namespace App\Models\RT;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $tables = 'kendaraan';
    protected $primarykey = 'id_kendaraan';
    protected $fillable = [
        'nama','nopol', 'jeniskendaraan', 'alamat',
    ];
}