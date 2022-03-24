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
        return view('warga.berita');
    }
    
    public function contact()
    {
        return view('warga.contact');
    }
    public function kegiatan()
    {
        return view('warga.kegiatan');
    }
    public function service()
    {
        return view('warga.service');
    }
    public function galeri()
    {
        return view('warga.galeri');
    }
    public function keuangan()
    {
        return view('warga.keuangan');
    }
    public function keamanan()
    {
        return view('warga.keamanan');
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
            $jumlah = $request->jumlah;
            $kendaraan = $request->kendaraan;
            $pekerjaaan = $request->pekerjaaan;
            $penghasilan = $request->penghasilan;

            // InsertOrUpdate ke Detail Users
            $cek_detail = DB::table('detail_users')->where('id_users',$id_users)->first();
            $data = [
                'id_users'              => $id_users,
                'id_jumlah_tanggungan'  => $jumlah,
                'id_kendaraan'          => $kendaraan,
                'id_pekerjaan'          => $pekerjaaan,
                'id_penghasilan'        => $penghasilan
            ];
            if(!empty($cek_detail)){
                DB::table('detail_users')->where('id_users',$id_users)->update($data);
            }else{
                DB::table('detail_users')->insert($data);
            }

            // InsertOrUpdate ke Hasil Normalisasi
            $cek_normalisasi = DB::table('hasil_normalisasi')->where('id_users',$id_users)->first();
            $rating = DB::table('bobot_kepentingan')->orderBy('rating_kepentingan','DESC')->first()->rating_kepentingan;
            $normalisasi_jumlah = Round($jumlah / $rating,2);
            $normalisasi_kendaraan = Round($kendaraan / $rating,2);
            $normalisasi_pekerjaaan = Round($pekerjaaan / $rating,2);
            $normalisasi_penghasilan = Round($penghasilan / $rating,2);
            $bobot_jumlah = DB::table('bobot_kepentingan')->where('kriteria','master_jumlah_tanggungan')->first()->rating_kepentingan;
            $bobot_kendaraan = DB::table('bobot_kepentingan')->where('kriteria','master_kendaraan')->first()->rating_kepentingan;
            $bobot_pekerjaaan = DB::table('bobot_kepentingan')->where('kriteria','master_pekerjaan')->first()->rating_kepentingan;
            $bobot_penghasilan = DB::table('bobot_kepentingan')->where('kriteria','master_penghasilan')->first()->rating_kepentingan;
            $rank_jumlah = $bobot_jumlah * $normalisasi_jumlah;
            $rank_kendaraan = $bobot_kendaraan * $normalisasi_kendaraan;
            $rank_pekerjaaan = $bobot_pekerjaaan * $normalisasi_pekerjaaan;
            $rank_penghasilan = $bobot_penghasilan * $normalisasi_penghasilan;
            $rank = Round($rank_jumlah + $rank_kendaraan + $rank_pekerjaaan + $rank_penghasilan,2);
            $data_normalisasi = [
                'id_users'              => $id_users,
                'id_jumlah_tanggungan'  => $normalisasi_jumlah,
                'id_kendaraan'          => $normalisasi_kendaraan,
                'id_pekerjaan'          => $normalisasi_pekerjaaan,
                'id_penghasilan'        => $normalisasi_penghasilan,
                'rank'                  => $rank
            ];
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
