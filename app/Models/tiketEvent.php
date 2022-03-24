<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tiketEvent extends Model
{
    protected $primary = 'id';

    protected $table = 'tiket_event';

    protected $guarded = [];

    public function master_event()
    {
        return $this->belongsTo("App\Models\masterEvent",'id_event','id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','id_users','id');
    }
}
