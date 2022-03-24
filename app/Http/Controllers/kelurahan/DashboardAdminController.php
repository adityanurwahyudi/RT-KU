<?php

namespace App\Http\Controllers\kelurahan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Kehadiran;

class DashboardAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");
        $data['user'] = Auth::user();
        
        return view('kelurahan.dashboard_admin', $data);
    }
}
