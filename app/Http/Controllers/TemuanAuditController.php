<?php

namespace App\Http\Controllers;

use App\AuditPlan;
use App\TemuanAudit;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'audit_plan_id' => 'required',
            'klausul_id' => 'required',
            'ketidaksesuaian' => 'required|string|max:100',
            'akar_masalah' => 'required|string|max:100',
            'klasifikasi_temuan' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }
        // dd($request->all());
        TemuanAudit::create($request->all());

        return response()->json(['success' => 'success'], 200);
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

        $is_user_kadept = auth()->user()->id === $temuanaudit->auditplan->departemen->kadept->id;
        $is_user_auditor = auth()->user()->id === $temuanaudit->auditplan->auditor->id;
        $is_user_auditor_lead = auth()->user()->id === $temuanaudit->auditplan->auditorLead->id;

        if (auth()->user()->hasAnyRole(['admin', 'auditor_lead', 'auditor'])) {
            $is_user_kadept = true;
            $is_user_auditor = true;
            $is_user_auditor_lead = true;
        }

        if ($model->status == 'Closed') {
            $is_user_kadept = false;
            $is_user_auditor = false;
            $is_user_auditor_lead = false;
        }

        return view('pages.temuanaudit.edit', compact([
            'model', 'is_user_kadept', 'is_user_auditor', 'is_user_auditor_lead'
        ]));
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
        $rules = [
            'ketidaksesuaian' => 'required|string|max:100',
            'akar_masalah' => 'required|string|max:100',
            'klasifikasi_temuan' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        $data = [
            'ketidaksesuaian' => $request->ketidaksesuaian,
            'akar_masalah' => $request->akar_masalah,
            'tindakan_perbaikan_pencegahan' => $request->tindakan_perbaikan_pencegahan,
            'tanggal_perbaikan_pencegahan' => $request->tanggal_perbaikan_pencegahan ? Carbon::createFromFormat('m-d-Y', $request->tanggal_perbaikan_pencegahan)->format('Y-m-d') : null,
            'review' => $request->review,
            'approval_kadept' => $request->approval_kadept ? 1 : 0,
            'approval_auditor' => $request->approval_auditor ? 1 : 0,
            'approval_auditor_lead' => $request->approval_auditor_lead ? 1 : 0,
        ];

        $temuanaudit->update($data);

        if ($temuanaudit->isCompleted()) {
            $temuanaudit->update(['status' => 1]);
        }

        $redirect_to = ['redirect_to' => route('temuanaudit.index')];

        session()->flash('message', 'Temuan Audit berhasil disimpan!');
        session()->flash('alert-type', 'success');

        return response()->json($redirect_to);
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
        try {
            $temuanaudit->delete();
            session()->flash('message', 'Temuan Audit berhasil dihapus!');
            session()->flash('alert-type', 'error');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('message', 'Data tidak bisa dihapus!');
            session()->flash('alert-type', 'error');
        }

        $redirect_to = ['redirect_to' => route('temuanaudit.index')];
        return response()->json($redirect_to);
    }

    public function reopen(TemuanAudit $temuanaudit)
    {
        $temuanaudit->update(['status' => 0]);

        $redirect_to = ['redirect_to' => route('temuanaudit.edit', $temuanaudit->id)];

        session()->flash('message', 'Temuan Audit berhasil di reopen!');
        session()->flash('alert-type', 'success');

        return response()->json($redirect_to);
    }

    public function datatable()
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

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('pages.temuanaudit.action', [
                    'model' => $model,
                    'url_edit' => route('temuanaudit.edit', $model->id),
                    'url_destroy' => route('temuanaudit.destroy', $model->id),
                ]);
            })
            // ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
