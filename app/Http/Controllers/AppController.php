<?php

namespace App\Http\Controllers;

use App\AuditPlan;
use App\Departement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = auth()->user();
        $auditplans = AuditPlan::all();
        // dd($auditplans);
        return view('index', compact([
            'auditplans'
        ]));
    }
}
