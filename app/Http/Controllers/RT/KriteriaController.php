<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class KriteriaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function kriteria()
    {
        $master_kendaraan = DB::table('master_kendaraan')->get();
        $bobot_kepentingan = DB::table('bobot_kepentingan')->get();
		$master_jumlah_tanggungan = DB::table('master_jumlah_tanggungan')->get();
		$master_pekerjaan = DB::table('master_pekerjaan')->get();
		$master_penghasilan = DB::table('master_penghasilan')->get();
		$no = 1;
		$No = 1;
		$NO = 1;
		$nO = 1;
		$NOO = 1;
		return view('RT.kriteria', compact('master_kendaraan','bobot_kepentingan','master_jumlah_tanggungan', 'master_pekerjaan','master_penghasilan', 'no', 'No','nO','NO','NOO',));
    }
	public function tambah()
	{
		return view('RT.formcreate.c_pekerjaan');
	}

    public function proses(Request $request)
	{
		DB::table('master_pekerjaan')->insert([
			'keterangan' => $request->keterangan,
			'bobot' => $request->bobot,
    	]);
		return redirect('RT/kriteria')->with(['success'=>'Data Berhasil Ditambahkan!']);;
	} 
    public function edit($id)
	{
		$pekerjaan = DB::table('master_pekerjaan')->where('id', $id)->get();
		return view('RT.formedit.e_pekerjaan', ['pekerjaan' => $pekerjaan]);
	}
    public function update(Request $request)
	{
		
		DB::table('master_pekerjaan')->where('id', $request->id)->update([
			'keterangan' => $request->keterangan,
			'bobot' => $request->bobot
		]);
	return redirect('RT/kriteria')->with(['success'=>'Data Berhasil Diupdate!']);;
	}
	public function hapus($id)
	{
		DB::table('master_pekerjaan')->where('id', $id)->delete();
		return redirect('RT/kriteria');
	}
}
