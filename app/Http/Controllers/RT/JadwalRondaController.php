<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\RondaEmail;
use Illuminate\Support\Facades\Mail;
use Exception;
use Auth;
use DB;
use PDF;

class JadwalRondaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        $data['no'] = 1;
        $data['jadwal'] = DB::table('jadwal_ronda')->select('tanggal')->where('rt', $rt)->where('rw', $rw)->groupBy('tanggal')->orderBy('tanggal','ASC')->get();

        return view('RT.jadwalronda', $data);
    }

    public function datatable()
    {
        $tanggal = ($_GET['tanggal']) ? $_GET['tanggal'] : null;
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        $jadwal = DB::table('jadwal_ronda')->select('jadwal_ronda.*','users.name')
                ->join('users','users.id','jadwal_ronda.id_users')
                ->leftjoin('detail_users','detail_users.id_users','users.id')
                ->where('jadwal_ronda.rt', $rt)
                ->where('jadwal_ronda.rw', $rw)
                ->when($tanggal, function($q, $tanggal){
                    $q->where('tanggal', $tanggal);
                })
                ->where('detail_users.jeniskelamin','Laki-laki')
                ->orderBy('tanggal','ASC')
                ->get();

        return $jadwal;
    }

    public function create()
    {
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        $data['warga'] = DB::table('users')->select('users.*')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->where('rt', $rt)
                    ->where('rw', $rw)
                    ->where('detail_users.jeniskelamin','Laki-laki')
                    ->where('status', 1)->get();

        return view('RT.formcreate.c_jadwalronda', $data);
    }

    
    public function cetak_jadwalronda($id){
        $tanggal = $_GET['tanggal'];
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        $jadwal = DB::table('jadwal_ronda')->select('jadwal_ronda.*','users.name')
                ->join('users','users.id','jadwal_ronda.id_users')
                ->where('jadwal_ronda.rt', $rt)
                ->where('jadwal_ronda.rw', $rw)
                ->where('tanggal', $tanggal)
                ->orderBy('tanggal','ASC')
                ->get();
        $pdf = PDF::loadView('RT.laporan.cetak_jadwalronda', $jadwal);
        return $pdf->stream();
    }
    
    public function save(Request $request)
    {
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        try{
            if(!empty($request->name)){
                $count_nama = count($request->name);
                for($i = 0 ; $i < $count_nama ; $i++){
                    $data = [
                        'id_users'  => $request->id_users[$i],
                        'tanggal'   => $request->tanggal,
                        'rt'        => $rt,
                        'rw'        => $rw
                    ];

                    DB::table('jadwal_ronda')->insert($data);
                }
                return redirect('/RT/jadwal-ronda')->with(['success'=>'Berhasil Simpan']);
            }else{
                return redirect('/RT/jadwal-ronda')->with(['error'=>'Gagal Simpan']);
            }
        }
        catch(Exception $e){
            return redirect('/RT/jadwal-ronda')->with(['error'=>'Error'.$e]);
        }
    }

    public function edit($id)
    {
        $data['jadwal'] = DB::table('jadwal_ronda')->where('id', $id)->first();

        return view('RT.formedit.e_jadwalronda', $data);
    }

    public function update(Request $request)
    {
        try{
            DB::table('jadwal_ronda')->where('id',$request->id)->update([
                'tanggal' => $request->tanggal
            ]);
            return redirect('/RT/jadwal-ronda')->with(['success'=>'Berhasil Simpan']);
        }catch(Exception $e){
            return redirect('/RT/jadwal-ronda')->with(['error'=>'Error'.$e]);
        }
    }

    public function hapus($id)
    {
        try{
            DB::table('jadwal_ronda')->where('id',$id)->delete();
            return redirect('/RT/jadwal-ronda')->with(['success'=>'Berhasil Delete']);
        }catch(Exception $e){
            return redirect('/RT/jadwal-ronda')->with(['error'=>'Error'.$e]);
        }
    }

    public function sendEmail($tgl){
        $besok = new \DateTime('tomorrow');
        $event = new \stdClass();

        $formatBesok = $besok->format('Y-m-d');
        $getDate = DB::table('jadwal_ronda')->where('jadwal_ronda.tanggal', $tgl)
                    ->join('users','users.id','jadwal_ronda.id_users')
                    ->get();
        
        foreach($getDate as $g){
            $event->senderEmail = $g->email;
            $event->email = $g->email; 
            $event->senderName = 'RT-KU';
            $event->subject = 'PEMBERITAHUAN JADWAL RONDA';
            $event->message = '';  
            $event->name = $g->name;
            $event->tanggal = $g->tanggal;

            Mail::send((new RondaEmail($event))->delay(30));
        }
        return redirect()->back()->with(['success'=>'Terkirim']);
    }

}
