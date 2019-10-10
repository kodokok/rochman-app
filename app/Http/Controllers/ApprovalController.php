<?php

namespace App\Http\Controllers;

use App\AuditPlan;
use App\Departemen;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function show()
    {
        return view('pages.approval.show');
    }

    public function datatable()
    {
        // $model = AuditPlan::where('approval_kadept', '=' ,1)->get();
        $model = Departemen::whereHas('auditplans', function($q) {
            $q->where('kadept_user_id', 8);
        })->get();
        return $model->auditplans()->get();
    }
}
