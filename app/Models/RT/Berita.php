<?php

namespace App\Models\RT;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $tables = 'berita';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama','tanggal', 'deskripsi', 'gambar',
    ];
}