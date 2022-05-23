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
    public function getTelpon()
    {
        $telpon = $_GET['telpon'];
        $data=DB::table('users')
        ->where('telpon',$telpon)
        ->get();
        if(count($data)>0)
        {
        $check=true;
        }else{
            $check=false;
        }

        echo $check;
    }
    public function getEmail()
    {
        $email = $_GET['email'];
        $data=DB::table('users')
        ->where('email',$email)
        ->get();
        if(count($data)>0)
        {
        $check=true;
        }else{
            $check=false;
        }

        echo $check;
    }
    
    public function getRw()
    {
        $rw = $_GET['rw'];
        $data=DB::table('users')
        ->where('rw',$rw)
        ->get();
        if(count($data)>0)
        {
        $check=true;
        }else{
            $check=false;
        }

        echo $check;
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
    public function contact_save(Request $request)
    {
        DB::table('contact')->insert([
			'nama' => $request->nama,
			'email' => $request->email,
            'telepon' => $request->telepon,
			'keterangan' => $request->keterangan,
		]);
		return redirect('/')->with(['success'=>'Data Berhasil Terkirim!']);;
    }
    
    public function contact_hapus($id)
    {
       
		DB::table('contact')->where('id', $id)->delete();
		return redirect('kelurahan/dashboard-kelurahan');
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
