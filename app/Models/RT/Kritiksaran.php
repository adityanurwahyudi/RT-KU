<?php

namespace App\Models\RT;

use Illuminate\Database\Eloquent\Model;

class Kritiksaran extends Model
{
    protected $tables = 'kritiksaran';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama','email', 'telepon', 'kritikdansaran',
    ];
}