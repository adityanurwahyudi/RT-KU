<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class RegisterController extends Controller
{
    public function register()
    {
        $data['rt'] = DB::table('users')->select('rt')
        ->whereNotNull('rt')
        ->groupBy('rt')
        ->get();
        $data['rw'] = DB::table('users')->select('rw')
        ->whereNotNull('rw')
        ->groupBy('rw')
        ->get();
         return view('register',$data);
    }
    public function save(Request $request)
    {
        //try{

            $data = [
                'name'              => $request->nama,
                'email'             => $request->email,
                'telpon'            => $request->telepon,
                'password'          => Hash::make($request->password),
                'password_real'     => $request->password,
                'rt'                => $request->RT,
                'rw'                => $request->RW,
                'status'            => 0,
            ];
           $users = User::create($data);
        
            $data_detail = [
                'id_users'         => $users->id,
                'nik'              => $request->nik,
                'nokk'             => $request->nokk,
                'agama'            => $request->agama,
                'alamat'           => $request->alamat,
                'jeniskelamin'     => $request->jeniskelamin,
                'kewarganegaraan'  => $request->kewarganegaraan,
                'pekerjaan'        => $request->pekerjaan,
                'statuspernikahan' => $request->statuspernikahan,
                'tanggallahir'     => $request->tanggallahir,
                'usia'             => $request->usia,
            ];
            DB::table('detail_users')->insert($data_detail);

            return redirect('/login')->with(['success'=>'Berhasil Simpan']);
        //catch(Exception $e){
           // return redirect('/RT/data-login-warga')->with(['error'=>'Gagal Simpan'.$e]);
        //}
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
   
}
