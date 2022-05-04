<?php

namespace App\Models\RT;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $tables = 'profile';
    protected $primarykey = 'id_profile';
    protected $fillable = [
        'nama', 'deskripsi', 'visi', 'misi', 'fotoprofile', 'strukturorganisasi', 'alamat','email', 'telepon','urlmaps',
    ];
}