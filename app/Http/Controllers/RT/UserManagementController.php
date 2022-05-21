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
        $id_users = Auth::guard('admin')->user()->id;
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        $data['no_normalisasi'] = 1;
        $data['no_rank'] = 1;
        
  
		$data['datawarga'] = DB::table('users')->where('users.id',$id_users)
                            ->leftjoin('detail_users','detail_users.id_users','users.id')
                            ->first();
        
        $kepentingan = DB::table('bobot_kepentingan')->sum('rating_kepentingan');
        $data['kepentingan'] = $kepentingan / 2;
        

        $data['detail_users'] = DB::table('detail_users')->select('detail_users.*','users.name','users.email','users.telpon')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->get();
    //count jenis kelamin
        $data['lakilaki'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('jeniskelamin','Laki-laki') 
                    ->count();
        $data['perempuan'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('jeniskelamin','Perempuan') 
                    ->count();
                    // count usia
        $data['usia'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw)
                    ->count();
        //count kewarganegaraan
        $data['WNI'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('kewarganegaraan','WNI') 
                    ->count();
        $data['WNA'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('kewarganegaraan','WNA') 
                    ->count();     
        //count status pernikahan
        $data['Menikah'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rt',$rt)
            ->where('rw',$rw) 
            ->where('statuspernikahan','Menikah') 
            ->count();
        $data['BelumMenikah'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rt',$rt)
            ->where('rw',$rw) 
            ->where('statuspernikahan','BelumMenikah') 
            ->count();
         $data['Cerai'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rt',$rt)
            ->where('rw',$rw) 
            ->where('statuspernikahan','Cerai') 
            ->count();

        //count agama             
        $data['islam'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','islam') 
                    ->count();
        $data['katholik'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','katholik') 
                    ->count();
       $data['protestan'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','protestan') 
                    ->count();
        $data['hindu'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','hindu') 
                    ->count();
        $data['buddha'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','buddha') 
                    ->count();
        $data['konghucu'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','konghucu') 
                    ->count();
        $data['normalisasi'] = DB::table('hasil_normalisasi')
                    ->join('users','users.id','hasil_normalisasi.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw)   
                    ->orderBy('rank','DESC') 
                    ->get();
        return view('RT.datawarga',$data);
    }
    public function edit($id)
	{
		$datawarga = DB::table('detail_users')->where('detail_users.id_users', $id)
        ->join('users','users.id','detail_users.id_users')->select('detail_users.*','users.name','users.telpon','users.email')
        ->get();
		return view('RT.formedit.e_datawarga', ['datawarga' => $datawarga]);
	}


    public function dataloginwarga()
    {
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        $data['no'] = 1;
        $data['No'] = 1;
        $data['users'] = DB::table('users')
        ->where('rt',$rt)
        ->where('rw',$rw)
        ->where('status',1)
        ->orderBy('id','ASC')->get();
        

        return view('RT.dataloginwarga', $data);
    }

    public function dataloginwarga_create()
    {
        return view('RT.formcreate.c_dataloginwarga');
    }

    public function dataloginwarga_save(Request $request)
    {
        //try{
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

            return redirect('/RT/data-login-warga')->with(['success'=>'Berhasil Simpan']);
        //catch(Exception $e){
           // return redirect('/RT/data-login-warga')->with(['error'=>'Gagal Simpan'.$e]);
        //}

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
