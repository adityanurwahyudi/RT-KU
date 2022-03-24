<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('RT.profile');
    }
    
    // view halaman RT
    public function beritadankegiatan()
    {
        return view('RT.beritadankegiatan');
    }

    public function galeri()
    {
        return view('RT.galeri');
    }

    public function keuangan()
    {
        return view('RT.keuangan');
    }
    
    public function surat()
    {
        return view('RT.surat');
    }
    
    public function kritiksaran()
    {
        return view('RT.kritiksaran');
    }
    
    public function security()
    {
        return view('RT.security');
    }
    
    public function keluarmasukwarga()
    {
        return view('RT.keluarmasukwarga');
    }
    
    public function pengaduan()
    {
        return view('RT.pengaduan');
    }
    
    public function index()
    {
        return view('warga.index');
    }
}
