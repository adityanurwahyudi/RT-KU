<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use DB;
use Auth;
use PDF;
use Illuminate\Support\Facades\Hash;
use Pusher;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { $rt = Auth::guard('user')->user()->rt;
		$rw = Auth::guard('user')->user()->rw;
        
        $profile = DB::table('profile')
                ->leftjoin('users','users.id','profile.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->get();
		return view('warga.index',
		compact('profile'));
    }
    public function profile()
    { 
         $rt = Auth::guard('user')->user()->rt;
		$rw = Auth::guard('user')->user()->rw;
        
        $profile = DB::table('profile')
                ->leftjoin('users','users.id','profile.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->get();
		return view('warga.profile',
		compact('profile'));
    }
    public function berita()
    {
        $rt = Auth::guard('user')->user()->rt;
		$rw = Auth::guard('user')->user()->rw;
        
        $berita = DB::table('berita')
                ->leftjoin('users','users.id','berita.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->paginate(4); 
		return view('warga.berita',
		compact('berita'));
    }
    public function datawargaa()
    {
        $rt = Auth::guard('user')->user()->rt;
		$rw = Auth::guard('user')->user()->rw;
        
		$no = 1;
        $No = 1;
        
        $datakependudukan = DB::table('datakependudukan')
                    ->join('users','users.id','datakependudukan.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw)   
                    ->get();

        $kendaraan = DB::table('kendaraan')
                ->leftjoin('users','users.id','kendaraan.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->whereIn('statuspermohonan', ['proses','selesai'])
                ->get();
		return view('warga.datawargaa',
		compact('kendaraan','datakependudukan','no','No'));
    }
    
    public function contact()
    {
        $rt = Auth::guard('user')->user()->rt;
		$rw = Auth::guard('user')->user()->rw;
        
        $kritiksaran = DB::table('kritiksaran')
                ->leftjoin('users','users.id','kritiksaran.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->get();
		return view('warga.contact',
		compact('kritiksaran'));
    }
    public function kegiatan()
    {
        $rt = Auth::guard('user')->user()->rt;
		$rw = Auth::guard('user')->user()->rw;
        
        $kegiatan = DB::table('kegiatan')
                ->leftjoin('users','users.id','kegiatan.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->paginate(4); 
		return view('warga.kegiatan',
		compact('kegiatan'));
    }
    public function service()
    {
        $id_users = Auth::guard('user')->user()->id;
        $data['no'] = 1;
        $data['domisili'] = DB::table('surat_domisili')->where('id_users',$id_users)->get();

        return view('warga.service', $data);
    }
    public function tambah_domisili(Request $request)
    {
        $data = [
            'nama'          => $request->nama,
            'id_users'      => Auth::guard('user')->user()->id,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'agama'         => $request->agama,
            'status'        => 0,
        ];
        DB::table('surat_domisili')->insert($data);

        return redirect()->back()->with(['success'=>'Data Simpan']);
    }
    public function edit_domisili(Request $request)
    {
        $data = [
            'nama'          => $request->nama,
            'id_users'      => Auth::guard('user')->user()->id,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'agama'         => $request->agama,
        ];
        DB::table('surat_domisili')->where('id',$request->id)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }
    public function kirim_domisili($id)
    {
        DB::table('surat_domisili')->where('id',$id)->update(['status'=>1]);
        
        // Notification
        $id_users = Auth::guard('user')->user()->id;
        $rt = Auth::guard('user')->user()->rt;
        $rw = Auth::guard('user')->user()->rw;
        $penerima = DB::table('users')->where('rt',$rt)->where('rw',$rw)->where('status',2)->first();
        $notif = [
            'url'           => url('/RT/surat'),
            'deskripsi'     => 'Pengajuan Surat Domisili',
            'id_pengirim'   => $id_users,
            'id_penerima'   => $penerima->id,
            'created_at'    => date('Y-m-d H:i:s'),
            'is_read'       => false
        ];
        DB::table('notification')->insert($notif);
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'dc54755d5048301338f6',
            'e1ce7abf10d456b68339',
            '1403900',
            $options
        );
    
        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);
        // End Notification
        
        return redirect()->back()->with(['success'=>'Data Kirim']);
    }
    public function cetak_domisili($id){

        $rt = Auth::guard('user')->user()->rt;
        $rw = Auth::guard('user')->user()->rw;
        $data['surat'] = DB::table('surat_domisili')->where('id', $id)->first();

        $data['ttd'] = DB::table('stempel_tanda_tangan')->select('stempel_tanda_tangan.*','users.name','users.rt','users.rw')
                    ->leftjoin('users','users.id','stempel_tanda_tangan.id_users')
                    ->where('users.rt', $rt)
                    ->where('users.rw', $rw)
                    ->first();

        // return view('warga.surat.cetak_domisili', $data);
        $pdf = PDF::loadView('warga.surat.cetak_domisili', $data);
        return $pdf->stream('surat-domisili.pdf');
    }
    public function galeri()
    {
        $rt = Auth::guard('user')->user()->rt;
		$rw = Auth::guard('user')->user()->rw;
        
        $foto = DB::table('foto')
                ->leftjoin('users','users.id','foto.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->paginate(4); 
        $video = DB::table('video')
                ->leftjoin('users','users.id','video.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->get();
		return view('warga.galeri',
		compact('foto','video'));
    }
    public function keuangan()
    { 
        $rt = Auth::guard('user')->user()->rt;
		$rw = Auth::guard('user')->user()->rw;
        
		$no = 1;
        $qris = DB::table('qris')
                ->leftjoin('users','users.id','qris.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->get();
        $keuangan = DB::table('keuangan')
                ->leftjoin('users','users.id','keuangan.id_users')
                ->where('users.rw', $rw)
                ->where('users.rt', $rt)
                ->get();
                return view('warga.keuangan',
		compact('qris','keuangan','no'));
    }
    public function keamanan()
    {
        $rt = Auth::guard('user')->user()->rt;
		$rw = Auth::guard('user')->user()->rw;
        
        $security = DB::table('security')
                ->leftjoin('users','users.id','security.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->get();
        $jadwal_ronda = DB::table('jadwal_ronda')
                        ->leftjoin('users','users.id','jadwal_ronda.id_users')
                        ->where('users.rw', $rw)
                        ->where('users.rt', $rt)
                        ->get();
                        
		$no = 1;
		return view('warga.keamanan',
		compact('security','jadwal_ronda','no'));
    }
    public function datawarga()
    {
        $id_users = Auth::guard('user')->user()->id;
        $data['tanggungan'] = DB::table('master_jumlah_tanggungan')->orderBy('id','ASC')->get();
        $data['kendaraan'] = DB::table('master_kendaraan')->orderBy('id','ASC')->get();
        $data['pekerjaan'] = DB::table('master_pekerjaan')->orderBy('id','ASC')->get();
        $data['penghasilan'] = DB::table('master_penghasilan')->orderBy('id','ASC')->get();
        $data['users'] = DB::table('detail_users')->where('id_users',$id_users)->first();

        return view('warga.datawarga',$data);
    }
    public function datawarga_update(Request $request)
    {
        try{
            $id_users = Auth::guard('user')->user()->id;
            $id_jumlah = $request->jumlah;
            $id_kendaraan = $request->kendaraan;
            $id_pekerjaaan = $request->pekerjaaan;
            $id_penghasilan = $request->penghasilan;

            // InsertOrUpdate ke Detail Users
            $cek_detail = DB::table('detail_users')->where('id_users',$id_users)->first();
            $data = [
                'id_users'              => $id_users,
                'id_jumlah_tanggungan'  => $id_jumlah,
                'id_kendaraan'          => $id_kendaraan,
                'id_pekerjaan'          => $id_pekerjaaan,
                'id_penghasilan'        => $id_penghasilan
            ];
            if(!empty($cek_detail)){
                DB::table('detail_users')->where('id_users',$id_users)->update($data);
            }else{
                DB::table('detail_users')->insert($data);
            }

            // Get Bobot Terbesar Kepentingan
            $rating = DB::table('bobot_kepentingan')->orderBy('rating_kepentingan','DESC')->first()->rating_kepentingan;

            // Get Bobot Berdasarkan Id
            $bobot_jumlah = getJumlahTanggungan($id_jumlah)->bobot;
            $bobot_kendaraan = getKendaraan($id_kendaraan)->bobot;
            $bobot_pekerjaan = getPekerjaan($id_pekerjaaan)->bobot;
            $bobot_penghasilan = getPenghasilan($id_penghasilan)->bobot;

            // Bobot yang didapet diNormalisasi
            $normalisasi_jumlah = Round($bobot_jumlah / $rating,2);
            $normalisasi_kendaraan = Round($bobot_kendaraan / $rating,2);
            $normalisasi_pekerjaaan = Round($bobot_pekerjaan / $rating,2);
            $normalisasi_penghasilan = Round($bobot_penghasilan / $rating,2);

            // Get Bobot Kepentingan
            $kepentingan_jumlah = DB::table('bobot_kepentingan')->where('kriteria','master_jumlah_tanggungan')->first()->rating_kepentingan;
            $kepentingan_kendaraan = DB::table('bobot_kepentingan')->where('kriteria','master_kendaraan')->first()->rating_kepentingan;
            $kepentingan_pekerjaaan = DB::table('bobot_kepentingan')->where('kriteria','master_pekerjaan')->first()->rating_kepentingan;
            $kepentingan_penghasilan = DB::table('bobot_kepentingan')->where('kriteria','master_penghasilan')->first()->rating_kepentingan;

            // Penentuan Rank
            $rank_jumlah = $kepentingan_jumlah * $normalisasi_jumlah;
            $rank_kendaraan = $kepentingan_kendaraan * $normalisasi_kendaraan;
            $rank_pekerjaaan = $kepentingan_pekerjaaan * $normalisasi_pekerjaaan;
            $rank_penghasilan = $kepentingan_penghasilan * $normalisasi_penghasilan;
            $rank = Round($rank_jumlah + $rank_kendaraan + $rank_pekerjaaan + $rank_penghasilan,2);
            $data_normalisasi = [
                'id_users'              => $id_users,
                'jumlah_tanggungan'     => $normalisasi_jumlah,
                'kendaraan'             => $normalisasi_kendaraan,
                'pekerjaan'             => $normalisasi_pekerjaaan,
                'penghasilan'           => $normalisasi_penghasilan,
                'rank'                  => $rank
            ];

            $cek_normalisasi = DB::table('hasil_normalisasi')->where('id_users',$id_users)->first();
            if(!empty($cek_normalisasi)){
                DB::table('hasil_normalisasi')->where('id_users',$id_users)->update($data_normalisasi);
            }else{
                DB::table('hasil_normalisasi')->insert($data_normalisasi);
            }

            return redirect()->back()->with(['success'=>'Berhasil Update']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal Update']);
        }
    }
    public function pindah()
    {
        return view('warga.pindah');
    }
    public function profil()
    {
        $id_users = Auth::guard('user')->user()->id;
        $data['users'] = DB::table('users')->where('id',$id_users)->orderBy('id','ASC')->first();

        return view('warga.profil',$data);
    }
    public function profil_update(Request $request)
    {
        try{
            $data = [
                'name'          => $request->nama,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'password_real' => $request->password
            ];
            DB::table('users')->where('id', $request->id)->update($data);

            return redirect()->back()->with(['success'=>'Data Update']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal Update'.$e]);
        }
    }
}
