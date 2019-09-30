<?php

namespace App\Http\Controllers;

use App\AuditPlan;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
    {
        $auditplans  = AuditPlan::with('temuanAudits')->get();
        // dd($auditplans);
        return view('monitoring.index', compact(['auditplans']));
    }
}
