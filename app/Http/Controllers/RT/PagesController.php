<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
use DB;
use Auth;

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
    public function keamanan()
    {
     
    $security = DB::table('security')->get();
    
    return view('warga.keamanan', compact('security'));  
    }
    public function surat()
    {
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        $data['no'] = 1;
        $data['domisili'] = DB::table('surat_domisili')->select('surat_domisili.*')
                        ->leftjoin('users','users.id','surat_domisili.id_users')
                        ->where('users.rt', $rt)
                        ->where('users.rw', $rw)
                        ->orderBy('tgl_lahir','ASC')->get();

        return view('RT.surat', $data);
    }

    public function delete_domisili($id)
    {
        DB::table('surat_domisili')->where('id', $id)->delete();

        return redirect()->back()->with(['success'=>'Delete Berhasil']);
    }

    public function verifikasi_domisili(Request $request)
    {
        DB::table('surat_domisili')->where('id', $request->id)->update([
            'status'=>$request->status,
            'catatan'=>$request->catatan
        ]);

        return redirect()->back()->with(['success'=>'Verifikasi Berhasil']);
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
