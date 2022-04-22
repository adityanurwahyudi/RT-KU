<?php



namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PengaduanController extends Controller
{
	public function index()
	{
		$pengaduan = DB::table('pengaduan')->get();
		$no = 1;
		return view('RT.pengaduan', compact('pengaduan', 'no'));
	}
	public function proses(Request $request)
	{
		if($request->hasFile('bukti')){
			$validated = $request->validate([
				'bukti' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,jpg,png,jpeg,gif,svg||max:100040|required',
			 ]);
			$file = $request->file('bukti');
			$path = 'upload/pengaduan';
			$namefile = uniqid().'.'.$file->getClientOriginalExtension();
			$file->move($path, $namefile);
		}else{
			$namefile = null;
		}
			$bukti = DB::table('pengaduan')->insert([
				'nama' =>  $request->nama,
				'telepon' =>  $request->telepon,
				'deskripsi' =>  $request->deskripsi,
				'tanggal' =>  $request->tanggal,
				'bukti' => $namefile,
		]);
		return redirect('warga/keamanan')->with(['success'=>'Data Berhasil Terkirim!']);
	}
	public function hapus($id)
	{
		DB::table('pengaduan')->where('id', $id)->delete();
		return redirect('RT/pengaduan');
	}
}