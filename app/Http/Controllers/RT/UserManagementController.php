<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Exception;

class UserManagementController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datawarga()
    {
        return view('RT.datawarga');
    }

    public function dataloginwarga()
    {
        return view('RT.dataloginwarga');
    }
}
