<?php

namespace App\Models\RT;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $tables = 'kegiatan';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama','tanggal', 'deskripsi', 'gambar',
    ];
}