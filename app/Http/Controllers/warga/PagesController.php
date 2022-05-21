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
    { 
        $rt = Auth::guard('user')->user()->rt;
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

        $data['no_normalisasi'] = 1;
        $data['no_rank'] = 1;
        

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
        $data['Belum_Menikah'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rt',$rt)
            ->where('rw',$rw) 
            ->where('statuspernikahan','Belum_Menikah') 
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

        //kendaraan
        $data['kendaraan'] = DB::table('kendaraan')
                    ->join('users','users.id','kendaraan.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw)   
                    ->whereIn('statuspermohonan', ['proses','selesai'])
                    ->get();
        return view('warga.datawargaa',$data);
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
        $userrt = DB::table('users')
                ->where('users.rw', $rw)
                ->where('users.rt', $rt)
                ->join('profile','profile.id_users','users.id')
                ->where('users.status', 2)->first();

        $profile = DB::table('profile')
                ->leftjoin('users','users.id','profile.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->get();
		return view('warga.contact',
		compact('kritiksaran','profile','userrt'));
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
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan'     => $request->pekerjaan,
            'alamat'        => $request->alamat,
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
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan'     => $request->pekerjaan,
            'alamat'        => $request->alamat,
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
        PushNotification('/RT/surat','Pengajuan Surat Domisili',$id_users,$penerima->id);
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
    
	
    public function storekritiksaran(Request $request)
	{
		$id_users = Auth::guard('user')->user()->id;
		DB::table('kritiksaran')->insert([
			'id_users'	=> $id_users,
			'nama' => $request->nama,
			'email' => $request->email,
            'telepon' => $request->telepon,
			'kritikdansaran' => $request->kritikdansaran,
		]);
		return redirect('warga/contact')->with(['success'=>'Data Berhasil Terkirim!']);
	}
    public function storekendaraan(Request $request)
	{
		$id_users = Auth::guard('user')->user()->id;

		DB::table('kendaraan')->insert([
			'id_users'	=> $id_users,
			'nama' => $request->nama,
			'nopol' => $request->nopol,
			'tanggal' => date('Y-m-d'),
			'jeniskendaraan' => $request->jeniskendaraan,
			'alamat' => $request->alamat,
			'statuspermohonan' => $request->statuspermohonan,
		]);

        // Notification
        $id_users = Auth::guard('user')->user()->id;
        $rt = Auth::guard('user')->user()->rt;
        $rw = Auth::guard('user')->user()->rw;
        $penerima = DB::table('users')->where('rt',$rt)->where('rw',$rw)->where('status',2)->first();
        PushNotification('/RT/kendaraan','Permohonan Kartu Akses Kendaraan',$id_users,$penerima->id);
        // End Notification
		return redirect('warga/data-warga')->with(['success'=>'Data Berhasil Terkirim!']);
	}
    public function prosespindah(Request $request)
	{
		$id_users = Auth::guard('user')->user()->id;

		DB::table('pindah')->insert([
			'id_users'	=> $id_users,
			'nama' => $request->nama,
			'tanggal' => $request->tanggal,
            'alamat' => $request->alamat,
			'alamatpindah' => $request->alamatpindah,
			'deskripsi' => $request->deskripsi,
		]);
		return redirect('warga/index')->with(['success'=>'Data Berhasil Terkirim!']);;
	
	}
    public function prosespengaduan(Request $request)
	{
		
		$id_users = Auth::guard('user')->user()->id;
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
				'id_users'	=> $id_users,
				'nama' =>  $request->nama,
				'telepon' =>  $request->telepon,
				'deskripsi' =>  $request->deskripsi,
				'tanggal' =>  $request->tanggal,
				'bukti' => $namefile,
		]);

        // Notification
        $id_users = Auth::guard('user')->user()->id;
        $rt = Auth::guard('user')->user()->rt;
        $rw = Auth::guard('user')->user()->rw;
        $penerima = DB::table('users')->where('rt',$rt)->where('rw',$rw)->where('status',2)->first();
        PushNotification('/RT/pengaduan','Pengaduan / Pelaporan',$id_users,$penerima->id);
        // End Notification
		return redirect('warga/keamanan')->with(['success'=>'Data Berhasil Terkirim!']);
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
        $profile = DB::table('profile')
                ->leftjoin('users','users.id','profile.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
                ->get();
        $jadwal_ronda = DB::table('jadwal_ronda')
                        ->leftjoin('users','users.id','jadwal_ronda.id_users')
                        ->leftjoin('detail_users','detail_users.id_users','users.id')
                        ->where('users.rw', $rw)
                        ->where('users.rt', $rt)
                        ->where('detail_users.jeniskelamin', 'Laki-laki')
                        ->get();
                        
		$no = 1;
		return view('warga.keamanan',
		compact('security','jadwal_ronda','profile','no'));
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
    public function datadiri_update(Request $request)
    {
        try{
            $id_users = Auth::guard('user')->user()->id;

            // InsertOrUpdate ke Detail Users
            $cek_detail = DB::table('detail_users')->where('id_users',$id_users)->first();
            $data = [
                'id_users'       => $id_users,           
                'nik' =>  $request->nik,
				'kewarganegaraan' =>  $request->kewarganegaraan,
                'nokk' =>  $request->nokk,
				'jeniskelamin' =>  $request->jeniskelamin,
                'pekerjaan' =>  $request->pekerjaan,
				'tanggallahir' =>  $request->tanggallahir,
                'usia' =>  $request->usia,
				'statuspernikahan' =>  $request->statuspernikahan,
                'agama' =>  $request->agama,
				'alamat' =>  $request->alamat,
            ];
            if(!empty($cek_detail)){
                DB::table('detail_users')->where('id_users',$id_users)->update($data);
            }else{
                DB::table('detail_users')->insert($data);
            } 
            return redirect()->back()->with(['success'=>'Berhasil Update']);
    }catch(Exception $e){
             return redirect()->back()->with(['error'=>'Gagal Update']);
            }

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
            $rt = Auth::guard('user')->user()->rt;
            $rw = Auth::guard('user')->user()->rw;
            $rating_jumlah = DB::table('detail_users')
                    ->leftjoin('users','users.id','detail_users.id_users')
                    ->leftjoin('master_jumlah_tanggungan','master_jumlah_tanggungan.id','detail_users.id_jumlah_tanggungan')
                    ->where('users.rt',$rt)
                    ->where('users.rw',$rw)
                    ->orderBy('master_jumlah_tanggungan.bobot','DESC')->first()->bobot;
            $rating_kendaraan = DB::table('detail_users')
                    ->leftjoin('users','users.id','detail_users.id_users')
                    ->leftjoin('master_kendaraan','master_kendaraan.id','detail_users.id_kendaraan')
                    ->where('users.rt',$rt)
                    ->where('users.rw',$rw)
                    ->orderBy('master_kendaraan.bobot','DESC')->first()->bobot;
            $rating_pekerjaan = DB::table('detail_users')
                    ->leftjoin('users','users.id','detail_users.id_users')
                    ->leftjoin('master_pekerjaan','master_pekerjaan.id','detail_users.id_pekerjaan')
                    ->where('users.rt',$rt)
                    ->where('users.rw',$rw)
                    ->orderBy('master_pekerjaan.bobot','DESC')->first()->bobot;
            $rating_penghasilan = DB::table('detail_users')
                    ->leftjoin('users','users.id','detail_users.id_users')
                    ->leftjoin('master_penghasilan','master_penghasilan.id','detail_users.id_penghasilan')
                    ->where('users.rt',$rt)
                    ->where('users.rw',$rw)
                    ->orderBy('master_penghasilan.bobot','DESC')->first()->bobot;

            // Get Bobot Berdasarkan Id
            $bobot_jumlah = getJumlahTanggungan($id_jumlah)->bobot;
            $bobot_kendaraan = getKendaraan($id_kendaraan)->bobot;
            $bobot_pekerjaan = getPekerjaan($id_pekerjaaan)->bobot;
            $bobot_penghasilan = getPenghasilan($id_penghasilan)->bobot;

            // Bobot yang didapet diNormalisasi
            $cek_rating_jumlah = !empty($rating_jumlah) ? $rating_jumlah : 1;
            $cek_rating_kendaraan = !empty($rating_kendaraan) ? $rating_kendaraan : 1;
            $cek_rating_pekerjaan = !empty($rating_pekerjaan) ? $rating_pekerjaan : 1;
            $cek_rating_penghasilan = !empty($rating_penghasilan) ? $rating_penghasilan : 1;

            $normalisasi_jumlah = Round($bobot_jumlah / $cek_rating_jumlah,3);
            $normalisasi_kendaraan = Round($bobot_kendaraan / $cek_rating_kendaraan,3);
            $normalisasi_pekerjaaan = Round($bobot_pekerjaan / $cek_rating_pekerjaan,3);
            $normalisasi_penghasilan = Round($bobot_penghasilan / $cek_rating_penghasilan,3);

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
            $rank = Round($rank_jumlah + $rank_kendaraan + $rank_pekerjaaan + $rank_penghasilan,3);
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
     public function rt_update(Request $request)
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
    public function rw_update(Request $request)
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
