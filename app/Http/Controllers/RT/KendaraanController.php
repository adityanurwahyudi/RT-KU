<?php

namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RT\Kendaraan;
use Auth;
use PDF;

class KendaraanController extends Controller
{
	public function index()
	{
		$rt = Auth::guard('admin')->user()->rt;
		$rw = Auth::guard('admin')->user()->rw;

		$kendaraan = DB::table('kendaraan')->select('kendaraan.*')
				->leftjoin('users','users.id','kendaraan.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get();
		$no = 1;

		if(isset($_GET['id_notif'])){
            DB::table('notification')->where('id',$_GET['id_notif'])->update(['is_read'=>true]);
        }

		return view('RT.kendaraan',
		compact('kendaraan', 'no'));
	}
	
	public function edit($id)
	{
		$kendaraan = DB::table('kendaraan')->where('id', $id)->get();
		return view('RT.formedit.e_kendaraan', ['kendaraan' => $kendaraan]);
	}
	public function update(Request $request)
	{
		$id_users = Auth::guard('admin')->user()->id;
		
		DB::table('kendaraan')->where('id', $request->id)->update([
			'id_users'	=> $id_users,
			'nama' => $request->nama,
			'nopol' => $request->nopol,
			'tanggal' => date('Y-m-d'),
			'jeniskendaraan' => $request->jeniskendaraan,
			'alamat' => $request->alamat,
			'statuspermohonan' => $request->statuspermohonan,
		]);
		return redirect('RT/kendaraan')->with(['success'=>'Data Berhasil Diupdate!']);
	}
	
	public function cetak_kendaraan()
    {
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;
		
		$kendaraan = DB::table('kendaraan')
				->select('kendaraan.*')
				->leftjoin('users','users.id','kendaraan.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get ();
 
    	$pdf = PDF::loadview('RT.laporan.cetak_kendaraan',['kendaraan'=>$kendaraan]);
    	return $pdf->stream();
    }
	public function hapus($id)
	{
		DB::table('kendaraan')->where('id', $id)->delete();
		return redirect('RT/kendaraan');
	}
}