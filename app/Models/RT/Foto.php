<?php

namespace App\Models\RT;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $tables = 'foto';
    protected $primarykey = 'id_foto';
    protected $fillable = [
        'gambar',
    ];
}