<?php

namespace App\Http\Controllers;

use App\AuditPlan;
use App\Departemen;
use App\TemuanAudit;

class MainController extends Controller
{
    public function home()
    {
        $auditplans = $this->getAuditPlanData();
        $openedAuditplansCount = $auditplans->where('approval_kadept', 0)->count();
        $approvedAuditplansCount = $auditplans->where('approval_kadept', 1)->count();
        $temuanaudits = $this->getTemuanAuditData();
        $closedTemuanCount = $temuanaudits->where('status', 'Closed')->count();
        $openedTemuanCount = $temuanaudits->where('status', 'Open')->count();

        // cart data
        $departemen = $this->getDepartemenData();
        $legendTemuanAudit = [];
        $dataTemuanAuditOpen = [];
        $dataTemuanAuditClosed = [];

        foreach ($departemen as $dept) {
            $legendTemuanAudit[] = $dept->kode;
            $dataTemuanAuditClosed[] = $temuanaudits->where('status', 'Closed')
                ->where('auditplan.departemen.id', $dept->id)->count();
            $dataTemuanAuditOpen[] = $temuanaudits->where('status', 'Open')
                ->where('auditplan.departemen.id', $dept->id)->count();
        }
        // dd($dataTemuanAuditClosed);

        return view('home', compact([
            'auditplans', 'openedAuditplansCount', 'approvedAuditplansCount',
            'temuanaudits', 'closedTemuanCount', 'openedTemuanCount',
            'legendTemuanAudit', 'dataTemuanAuditOpen', 'dataTemuanAuditClosed'
        ]));
    }

    public function getAuditPlanData()
    {
        $user = auth()->user();
        $model = [];

        switch (true) {
            case $user->hasAnyRole(['admin', 'auditor_lead', 'auditor', 'direksi']):
                $model = AuditPlan::with([
                    'departemen', 'auditee', 'auditor', 'auditorLead', 'klausuls'
                ])->get();
                break;
            case $user->hasAnyRole(['kadept']):
                $model = AuditPlan::whereHas('departemen.kadept', function ($q) use ($user) {
                    $q->where('kadept_user_id', $user->id);
                })->with([
                    'departemen', 'auditee', 'auditor', 'auditorLead', 'klausuls'
                ])->get();
                # code...
                break;
            default:
                $model = AuditPlan::whereHas('auditee', function ($q) use ($user) {
                    $q->where('id', $user->id);
                })->with([
                    'departemen', 'auditee', 'auditor', 'auditorLead', 'klausuls'
                ])->get();
                # code...
                break;
        }

        return $model;
    }

    public function getTemuanAuditData()
    {
        $user = auth()->user();
        // dd($user->getRoleNames());
        $model = [];

        switch (true) {
            case $user->hasAnyRole(['admin', 'auditor_lead', 'direksi', 'auditor']):
                $model = TemuanAudit::with(['auditplan', 'auditplan.auditee', 'klausul'])->get();
                break;
            case $user->hasAnyRole(['kadept']):
                $model = TemuanAudit::whereHas('auditplan.departemen.kadept', function ($q) use ($user) {
                    $q->where('kadept_user_id', $user->id);
                })->with(['auditplan', 'auditplan.auditee', 'klausul'])->get();
                break;
            default:
                $model = TemuanAudit::whereHas('auditplan', function ($q) use ($user) {
                    $q->where('auditee_user_id', $user->id);
                })->with(['auditplan', 'auditplan.auditee', 'klausul'])->get();
                # code...
                break;
        }

        return $model;
    }

    public function getDepartemenData()
    {
        return Departemen::all();
    }
}
