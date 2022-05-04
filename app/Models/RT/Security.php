<?php

namespace App\Models\RT;

use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    protected $tables = 'security';
    protected $primarykey = 'id_security';
    protected $fillable = [
        'nama','telepon', 'gambar',
    ];
}