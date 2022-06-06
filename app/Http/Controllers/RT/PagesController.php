<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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

        $data['ttd'] = DB::table('stempel_tanda_tangan')->select('stempel_tanda_tangan.*','users.rt','users.rw')
                    ->leftjoin('users','users.id','stempel_tanda_tangan.id_users')
                    ->where('users.rt', $rt)
                    ->where('users.rw', $rw)
                    ->get();
        $data['no_domisili'] = 1;
        $data['domisili'] = DB::table('surat_domisili')->select('surat_domisili.*')
                        ->leftjoin('users','users.id','surat_domisili.id_users')
                        ->where('users.rt', $rt)
                        ->where('users.rw', $rw)
                        ->orderBy('surat_domisili.id','DESC')
                        ->get();
        $data['no_pengantar'] = 1;
        $data['pengantar'] = DB::table('surat_pengantar')->select('surat_pengantar.*')
                        ->leftjoin('users','users.id','surat_pengantar.id_users')
                        ->where('users.rt', $rt)
                        ->where('users.rw', $rw)
                        ->orderBy('surat_pengantar.id','DESC')
                        ->get();
        $data['no_kematian'] = 1;
        $data['kematian'] = DB::table('surat_kematian')->select('surat_kematian.*')
                        ->leftjoin('users','users.id','surat_kematian.id_users')
                        ->where('users.rt', $rt)
                        ->where('users.rw', $rw)
                        ->orderBy('surat_kematian.id','DESC')
                        ->get();

        if(isset($_GET['id_notif'])){
            DB::table('notification')->where('id',$_GET['id_notif'])->update(['is_read'=>true]);
        }

        return view('RT.surat', $data);
    }

    public function tambah_ttd(Request $request)
    {
        $id_users = Auth::guard('admin')->user()->id;
        if($request->hasFile('tanda_tangan')){
            $file = $request->file('tanda_tangan');
            $path = public_path().'/upload/tanda_tangan';
            $namefile_ttd = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($path,$namefile_ttd);
        }else{
            $namefile_ttd=null;
        }
        if($request->hasFile('stempel')){
            $file = $request->file('stempel');
            $path = public_path().'/upload/stempel';
            $namefile_stempel = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($path,$namefile_stempel);
        }else{
            $namefile_stempel=null;
        }

        DB::table('stempel_tanda_tangan')->insert([
            'id_users'      => $id_users,
            'tanda_tangan'  => $namefile_ttd,
            'stempel'       => $namefile_stempel,
        ]);

        return redirect()->back()->with(['success'=>'Simpan Berhasil']);
    }

    public function update_ttd(Request $request)
    {
        $id_users = Auth::guard('admin')->user()->id;
        $data = DB::table('stempel_tanda_tangan')->where('id',$request->id)->first();
        if($request->hasFile('tanda_tangan')){
            $file = $request->file('tanda_tangan');
            $path = public_path().'/upload/tanda_tangan';
            $namefile_ttd = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($path,$namefile_ttd);

            $path = public_path()."/upload/tanda_tangan/".$data->tanda_tangan;
            if(is_file($path)){
                @unlink($path);
            }
        }else{
            $namefile_ttd = $data->tanda_tangan;
        }
        if($request->hasFile('stempel')){
            $file = $request->file('stempel');
            $path = public_path().'/upload/stempel';
            $namefile_stempel = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($path,$namefile_stempel);

            $path = public_path()."/upload/stempel/".$data->stempel;
            if(is_file($path)){
                @unlink($path);
            }
        }else{
            $namefile_stempel = $data->stempel;
        }

        DB::table('stempel_tanda_tangan')->where('id',$request->id)->update([
            'id_users'      => $id_users,
            'tanda_tangan'  => $namefile_ttd,
            'stempel'       => $namefile_stempel,
        ]);

        return redirect()->back()->with(['success'=>'Simpan Berhasil']);
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

    public function delete_pengantar($id)
    {
        DB::table('surat_pengantar')->where('id', $id)->delete();

        return redirect()->back()->with(['success'=>'Delete Berhasil']);
    }

    public function verifikasi_pengantar(Request $request)
    {
        DB::table('surat_pengantar')->where('id', $request->id)->update([
            'status'=>$request->status,
            'catatan'=>$request->catatan
        ]);

        return redirect()->back()->with(['success'=>'Verifikasi Berhasil']);
    }

    public function delete_kematian($id)
    {
        DB::table('surat_kematian')->where('id', $id)->delete();

        return redirect()->back()->with(['success'=>'Delete Berhasil']);
    }

    public function verifikasi_kematian(Request $request)
    {
        DB::table('surat_kematian')->where('id', $request->id)->update([
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

    public function notification()
    {
        $id_users = Auth::guard('admin')->user()->id;
        $data = notification($id_users);

        echo json_encode([
            'data' => $data,
            'count' => count($data)
        ]);
    }
}
