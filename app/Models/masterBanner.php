<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class masterBanner extends Model
{
    protected $primary = 'id';

    protected $table = 'master_banner';

    protected $guarded = [];
    // protected $fillable = ['id', 'id_users', 'hari','tanggal','nama_kua','kecamatan','walikota','provinsi','status_nikah','status','catatan'];
    // public $timestamps = false;
}
