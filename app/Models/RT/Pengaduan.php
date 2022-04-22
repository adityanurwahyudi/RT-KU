<?php

namespace App\Models\RT;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $tables = 'pengaduan';
    protected $primarykey = 'id_pengaduan';
    protected $fillable = [
        'nama','telepon', 'bukti','keterangan',
    ];
}