<?php

namespace App\Http\Controllers;

use App\AuditPlan;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function show()
    {
        return view('pages.approval.show');
    }

    public function datatable($id)
    {
        // $model = AuditPlan::where('approval_kadept', '=' ,1)->where('kadept_user_id')->get();
        // return $model;
    }
}
