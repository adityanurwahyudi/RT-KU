<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Exception;
use Auth;
use Hash;

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
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        $data['no'] = 1;
        $data['users'] = DB::table('users')->where('rt',$rt)->where('rw',$rw)->where('status',1)->orderBy('id','ASC')->get();

        return view('RT.dataloginwarga', $data);
    }

    public function dataloginwarga_create()
    {
        return view('RT.formcreate.c_dataloginwarga');
    }

    public function dataloginwarga_save(Request $request)
    {
        try{
            $rt = Auth::guard('admin')->user()->rt;
            $rw = Auth::guard('admin')->user()->rw;

            $data = [
                'name'              => $request->nama,
                'email'             => $request->email,
                'telpon'            => $request->telepon,
                'password'          => Hash::make($request->password),
                'password_real'     => $request->password,
                'rt'                => $rt,
                'rw'                => $rw,
                'status'            => 1
            ];
            DB::table('users')->insert($data);

            return redirect('/RT/data-login-warga')->with(['success'=>'Berhasil Simpan']);
        }catch(Exception $e){
            return redirect('/RT/data-login-warga')->with(['error'=>'Gagal Simpan'.$e]);
        }

    }

    public function dataloginwarga_edit($id)
    {
        $data['users'] = DB::table('users')->where('id', $id)->first();

        return view('RT.formedit.e_dataloginwarga', $data);
    }

    public function dataloginwarga_update(Request $request)
    {
        try{
            $rt = Auth::guard('admin')->user()->rt;
            $rw = Auth::guard('admin')->user()->rw;

            $data = [
                'name'              => $request->nama,
                'email'             => $request->email,
                'telpon'            => $request->telepon,
                'password'          => Hash::make($request->password),
                'password_real'     => $request->password,
                'rt'                => $rt,
                'rw'                => $rw,
                'status'            => 1
            ];
            DB::table('users')->where('id',$request->id)->update($data);

            return redirect('/RT/data-login-warga')->with(['success'=>'Berhasil Simpan']);
        }catch(Exception $e){
            return redirect('/RT/data-login-warga')->with(['error'=>'Gagal Simpan'.$e]);
        }
    }
    
    public function dataloginwarga_hapus($id)
    {
        try{
            DB::table('users')->where('id', $id)->delete();
            $cek = DB::table('detail_users')->where('id_users', $id)->first();
            if(!empty($cek)){
                DB::table('detail_users')->where('id_users', $id)->delete();
            }
            
            return redirect('/RT/data-login-warga')->with(['success'=>'Berhasil Simpan']);
        }catch(Exception $e){
            return redirect('/RT/data-login-warga')->with(['error'=>'Gagal Hapus'.$e]);
        }
    }
}
