<?php



namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RT\Kritiksaran;
use Auth;

class KritiksaranController extends Controller
{
	public function index()
	{
		$rt = Auth::guard('admin')->user()->rt;
		$rw = Auth::guard('admin')->user()->rw;

		$kritiksaran = DB::table('kritiksaran')->select('kritiksaran.*')
				->leftjoin('users','users.id','kritiksaran.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get();
		$no = 1;
		return view('RT.kritiksaran',
		compact('kritiksaran', 'no'));
	}
	public function store(Request $request)
	{
		$id_users = Auth::guard('admin')->user()->id;

		DB::table('kritiksaran')->insert([
			'id_users'	=> $id_users,
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