<?php



namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;
use PDF;

class PengaduanController extends Controller
{
	public function index()
	{
		$rt = Auth::guard('admin')->user()->rt;
		$rw = Auth::guard('admin')->user()->rw;

		$pengaduan = DB::table('pengaduan')->select('pengaduan.*')
				->leftjoin('users','users.id','pengaduan.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get();
		$no = 1;
		return view('RT.pengaduan', compact('pengaduan', 'no'));
	}
	
	public function cetak_pengaduan()
    {
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;
		
		$pengaduan = DB::table('pengaduan')
				->select('pengaduan.*')
				->leftjoin('users','users.id','pengaduan.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get ();
 
    	$pdf = PDF::loadview('RT.laporan.cetak_pengaduan',['pengaduan'=>$pengaduan]);
    	return $pdf->stream();
    }
	
	public function hapus($id)
	{
		DB::table('pengaduan')->where('id', $id)->delete();
		return redirect('RT/pengaduan');
	}
}