<?php

namespace App\Models\RT;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $tables = 'video';
    protected $primarykey = 'id_video';
    protected $fillable = [
        'videoURL',
    ];
}