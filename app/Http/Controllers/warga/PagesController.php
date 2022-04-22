<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use DB;
use Auth;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('warga.index');
    }
    public function profile()
    {
        return view('warga.profile');
    }
    public function berita()
    {
        $berita = DB::table('berita')->get();
		return view('warga.berita',
		compact('berita'));
    }
    public function datawargaa()
    {
        
        $kendaraan = DB::table('kendaraan')->whereIn('status',  ['proses','selesai'])->get();
        $no = 1;
		return view('warga.datawargaa',
		compact('kendaraan','no'));
    }
    
    public function contact()
    {
        $kritiksaran = DB::table('kritiksaran')->get();
		return view('warga.contact',
		compact('kritiksaran'));
    }
    public function kegiatan()
    {
        $kegiatan = DB::table('kegiatan')->get();
		return view('warga.kegiatan',
		compact('kegiatan'));
    }
    public function service()
    {
        return view('warga.service');
    }
    public function galeri()
    {
        $foto = DB::table('foto')->get();
        $video = DB::table('video')->get();
		return view('warga.galeri',
		compact('foto','video'));
    }
    public function keuangan()
    {
        $qris = DB::table('qris')->get();
		return view('warga.keuangan',
		compact('qris'));
    }
    public function keamanan()
    {
        $security = DB::table('security')->get();
		return view('warga.keamanan',
		compact('security'));
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
}
