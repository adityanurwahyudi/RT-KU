<?php
namespace App\Http\Controllers\kelurahan;


use Illuminate\View\View;
use App\Models\Kehadiran;;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use DB;
use Auth;
use PDF;

class DataKependudukanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function datawarga()
    {   
        $No = 1;   
        $datakependudukan = DB::table('datakependudukan')
                    ->join('users','users.id','datakependudukan.id_users')
                    ->get();
		return view('kelurahan.datawarga',
		compact('datakependudukan','No'));
    }
    
    }
