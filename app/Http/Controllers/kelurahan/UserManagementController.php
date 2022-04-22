<?php

namespace App\Http\Controllers\kelurahan;

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
        return view('RW.datawarga');
    }

    public function dataloginwarga()
    {
        $rw = Auth::guard('admin')->user()->rw;

        $data['no'] = 1;
        $data['users'] = DB::table('users')->whereNull('rt')->whereNotNull('rw')->where('status',3)->orderBy('id','ASC')->get();

        return view('kelurahan.dataloginwarga', $data);
    }

    public function dataloginwarga_create()
    {
        return view('kelurahan.formcreate.c_dataloginwarga');
    }

    public function dataloginwarga_save(Request $request)
    {
        try{
            $data = [
                'name'              => $request->nama,
                'email'             => $request->email,
                'telpon'            => $request->telepon,
                'password'          => Hash::make($request->password),
                'password_real'     => $request->password,
                'rt'                => NULL,
                'rw'                => $request->rw,
                'status'            => 3
            ];
            DB::table('users')->insert($data);

            return redirect('/kelurahan/data-login-warga')->with(['success'=>'Berhasil Simpan']);
        }catch(Exception $e){
            return redirect('/kelurahan/data-login-warga')->with(['error'=>'Gagal Simpan'.$e]);
        }

    }

    public function dataloginwarga_edit($id)
    {
        $data['users'] = DB::table('users')->where('id', $id)->first();

        return view('kelurahan.formedit.e_dataloginwarga', $data);
    }

    public function dataloginwarga_update(Request $request)
    {
        try{

            $data = [
                'name'              => $request->nama,
                'email'             => $request->email,
                'telpon'            => $request->telepon,
                'password'          => Hash::make($request->password),
                'password_real'     => $request->password,
                'rt'                => NULL,
                'rw'                => $request->rw,
                'status'            => 3
            ];
            DB::table('users')->where('id',$request->id)->update($data);

            return redirect('/kelurahan/data-login-warga')->with(['success'=>'Berhasil Simpan']);
        }catch(Exception $e){
            return redirect('/kelurahan/data-login-warga')->with(['error'=>'Gagal Simpan'.$e]);
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
            
            return redirect('/kelurahan/data-login-warga')->with(['success'=>'Berhasil Simpan']);
        }catch(Exception $e){
            return redirect('/kelurahan/data-login-warga')->with(['error'=>'Gagal Hapus'.$e]);
        }
    }
}
