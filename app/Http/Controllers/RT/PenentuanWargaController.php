<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class PenentuanWargaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function SPKWarga()
    {
        return view('RT.SPKwarga');
    }

}
