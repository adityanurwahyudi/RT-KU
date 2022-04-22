<?php



namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RT\Kritiksaran;

class KritiksaranController extends Controller
{
	public function index()
	{
		$kritiksaran = DB::table('kritiksaran')->get();
		$no = 1;
		return view('RT.kritiksaran',
		compact('kritiksaran', 'no'));
	}
	public function store(Request $request)
	{
		//dd($request->all());
		DB::table('kritiksaran')->insert([
			'nama' => $request->nama,
			'email' => $request->email,
            'telepon' => $request->telepon,
			'kritikdansaran' => $request->kritikdansaran,
		]);
		return redirect('warga/contact')->with(['success'=>'Data Berhasil Terkirim!']);
	}
	public function hapus($id)
	{
		DB::table('kritiksaran')->where('id', $id)->delete();
		return redirect('RT/kritiksaran');
	}
}