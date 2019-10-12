<?php

namespace App\Http\Controllers;

use App\AuditPlan;
use App\Departement;
use App\TemuanAudit;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class TemuanAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.temuanaudit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temuanaudit = new TemuanAudit();
        $departement = Departement::pluck('name', 'id');
        // dd($auditplans);
        return view('temuanaudit.create', compact(['temuanaudit','departement']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'audit_plan_id' => 'required',
            'ketidaksesuaian' => 'required|string|max:255',
            'akar_masalah' => 'required|string|max:255',
            'tindakan_perbaikan' => 'required|string|max:255',
            'duedate_perbaikan' => 'required|date_format:m-d-Y',
            'tindakan_pencegahan' => 'required|string|max:255',
            'duedate_pencegahan' => 'required|date_format:m-d-Y',
        ]);

        $duedate_perbaikan =  Carbon::createFromFormat('m-d-Y', $request->duedate_perbaikan)->format('Y-m-d');
        $duedate_pencegahan =  Carbon::createFromFormat('m-d-Y', $request->duedate_pencegahan)->format('Y-m-d');

        TemuanAudit::create([
            'audit_plan_id' => $request->audit_plan_id,
            'ketidaksesuaian' => $request->ketidaksesuaian,
            'akar_masalah' => $request->akar_masalah,
            'tindakan_perbaikan' => $request->tindakan_perbaikan,
            'duedate_perbaikan' => $duedate_perbaikan,
            'tindakan_pencegahan' => $request->tindakan_pencegahan,
            'duedate_pencegahan' => $duedate_pencegahan,
            'status' => 0
        ]);

        $route = 'temuanaudit.index';
        if ($request->action === 'Save & Create New') {
            $route = 'temuanaudit.create';
        }

        $notification = [
            'message' => 'Temuan Audit successfully created!',
            'alert-type' => 'success'
        ];

        return redirect()->route($route)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TemuanAudit  $temuanaudit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TemuanAudit $temuanaudit)
    {
        $auditplan = AuditPlan::findOrFail($temuanaudit->audit_plan_id);
        return view('temuanaudit.confirm', compact(['temuanaudit', 'auditplan']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TemuanAudit  $temuanaudit
     * @return \Illuminate\Http\Response
     */
    public function edit(TemuanAudit $temuanaudit)
    {
        $model = $temuanaudit;
        $departement = Departement::pluck('name', 'id');
        $auditplan = AuditPlan::findOrFail($temuanaudit->audit_plan_id);

        return view('temuanaudit.create', compact(['temuanaudit', 'auditplan', 'departement']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TemuanAudit  $temuanaudit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TemuanAudit $temuanaudit)
    {
        // dd($request->all());
        $this->validate($request, [
            'audit_plan_id' => 'required',
            'ketidaksesuaian' => 'required|string|max:255',
            'akar_masalah' => 'required|string|max:255',
            'tindakan_perbaikan' => 'required|string|max:255',
            'duedate_perbaikan' => 'required|date_format:m-d-Y',
            'tindakan_pencegahan' => 'required|string|max:255',
            'duedate_pencegahan' => 'required|date_format:m-d-Y',
        ]);

        $duedate_perbaikan =  Carbon::createFromFormat('m-d-Y', $request->duedate_perbaikan)->format('Y-m-d');
        $duedate_pencegahan =  Carbon::createFromFormat('m-d-Y', $request->duedate_pencegahan)->format('Y-m-d');

        $data = [
            'ketidaksesuaian' => $request->ketidaksesuaian,
            'akar_masalah' => $request->akar_masalah,
            'tindakan_perbaikan' => $request->tindakan_perbaikan,
            'duedate_perbaikan' => $duedate_perbaikan,
            'tindakan_pencegahan' => $request->tindakan_pencegahan,
            'duedate_pencegahan' => $duedate_pencegahan,
        ];

        $temuanaudit->update($data);

        $notification = [
            'message' => 'Temuan Audit successfully updated!',
            'alert-type' => 'info'
        ];

        return redirect()->route('temuanaudit.index')->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TemuanAudit  $temuanaudit
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request, TemuanAudit $temuanaudit)
    {
        // dd($request->all());
        $this->validate($request, [
            'review' => 'required',
        ]);

        $approve_kadept = $request->approve_kadept ? true : false;
        $approve_auditee = $request->approve_auditee ? true : false;
        $approve_auditor = $request->approve_auditor ? true : false;
        $approve_auditor_leader = $request->approve_auditor_leader ? true : false;

        $data = [
            'review' => $request->review,
            'approve_kadept' => $approve_kadept,
            'approve_auditee' => $approve_auditee,
            'approve_auditor' => $approve_auditor,
            'approve_auditor_leader' => $approve_auditor_leader,
        ];

        $status = 0;

        if ($approve_kadept && $approve_auditee && $approve_auditor && $approve_auditor_leader) {
            $status = 1;
        }

        if ($request->has('status')) {
            $data['status'] = $status;
        }

        $temuanaudit->update($data);

        $notification = [
            'message' => 'Temuan Audit successfully confirm!',
            'alert-type' => 'info'
        ];

        if ($request->has('redirect_to')) {
            return redirect($request->redirect_to)->with($notification);
        }
        return redirect()->route('temuanaudit.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TemuanAudit  $temuanaudit
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemuanAudit $temuanaudit)
    {
        $temuanaudit->delete();
    }

    public function datatable()
    {
        // for ($i=1; $i < 20; $i++) {
            $auditplans = AuditPlan::where('approval_kadept', 1)->get();
            // print_r($auditplans->find(1));
            $data = $auditplans->find(1);
            // $klausul = $data->klausuls->get();
            print_r($data->id);
            dd($data->klausuls->random()->id);
            // foreach ($data->klausuls as $klausul) {
            //     var_dump($klausul->id);
            // }
        // }
        die;
        // $klausuls = $auditplans->klausuls->get();
        // dd($klausuls);
        // foreach ($auditplans->klausuls as $klausul) {
        //     var_dump($klausul->nama);
        // }
        // die;

        $model = TemuanAudit::all();
        // $model = TemuanAudit::findOrFail(1)->get();
        // dd($model->auditplan->catatan);

        return DataTables::of($model)
            // ->addColumn('auditplan_objectif_audit', function ($model) {
            //     return $model->audit_plan->objektif_audit;
            // })
            ->addColumn('action', function ($model) {
                return view('pages.temuanaudit.action', [
                    'model' => $model,
                    'url_edit' => route('temuanaudit.edit', $model->id),
                    'url_destroy' => route('temuanaudit.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
