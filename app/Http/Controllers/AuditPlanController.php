<?php

namespace App\Http\Controllers;

use App\AuditPlan;
use App\Departemen;
use App\Klausul;
use App\TemuanAudit;
use App\User;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Validator;

class AuditPlanController extends Controller
{
    protected $auditorRoles = ['auditor', 'auditor_lead', 'admin'];
    protected $auditorLeadRoles =  ['auditor_lead', 'admin'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.auditplan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->hasAnyRole(['admin', 'auditor_lead', 'auditor'])) {
            return back();
        }

        $departemen = Departemen::pluck('kode','id');
        $klausul = Klausul::pluck('nama', 'id');
        $auditee = User::pluck('nama', 'id');
        $auditor = User::role($this->auditorRoles)->pluck('nama', 'id');
        $auditorLead = User::role($this->auditorLeadRoles)->pluck('nama', 'id');
        // dd($departement);
        return view('pages.auditplan.create', compact([
            'departemen',
            'klausul',
            'auditee',
            'auditor',
            'auditorLead'
        ]));
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
            'departemen_id' => 'required',
            'auditee_user_id' => 'required',
            'auditor_user_id' => 'required|different:auditee_user_id',
            'auditor_lead_user_id' => 'required|different:auditee_user_id',
            'tanggal' => 'required|date_format:m-d-Y|after_or_equal:today',
            'waktu' => 'required|date_format:H:i:s',
            'klausul_id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        $tanggal =  Carbon::createFromFormat('m-d-Y', $request->tanggal)->format('Y-m-d');
        $waktu =  Carbon::createFromFormat('H:i:s', $request->waktu)->format('H:i:s');

        $auditplan = AuditPlan::create([
            'departemen_id' => $request->departemen_id,
            'approval_kadept' => 0,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'auditee_user_id' => $request->auditee_user_id,
            'auditor_user_id' => $request->auditor_user_id,
            'auditor_lead_user_id' => $request->auditor_lead_user_id,
        ]);

        if ($request->has('klausul_id')) {
            $auditplan->klausuls()->sync($request->klausul_id);
        }

        $redirect_to = ['redirect_to' => route('auditplan.index')];

        session()->flash('message', 'Audit Plan successfully created!');
        session()->flash('alert-type', 'success');

        return response()->json($redirect_to);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditPlan $auditplan)
    {
        if (!auth()->user()->hasAnyRole(['admin', 'auditor_lead', 'auditor', 'kadept'])) {
            return back();
        }

        $model = $auditplan;
        $kadept = $auditplan->departemen->kadept->nama;
        $auditee = User::with('roles')->pluck('nama', 'id');
        $auditor = User::role($this->auditorRoles)->pluck('nama', 'id');
        $auditorLead = User::role($this->auditorLeadRoles)->pluck('nama', 'id');
        $departemen = Departemen::pluck('kode', 'id');
        $klausul = Klausul::pluck('nama', 'id');
        // dd($model->klausuls()->get());
        $klausul_temuan = [];
        foreach ($model->klausuls as $klausul) {

            $match = ['audit_plan_id' => $model->id, 'klausul_id' => $klausul->id];
            $exists = TemuanAudit::where($match)->exists();
            if ($exists) {
                $klausul_temuan[$klausul->id] = $klausul->nama;
            }
        }

        // dd($klausul_temuan);
        return view('pages.auditplan.edit', compact([
            'model', 'klausul', 'departemen', 'auditee', 'auditor', 'auditorLead', 'kadept', 'klausul_temuan'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuditPlan $auditplan)
    {
        $rules = [
            'departemen_id' => 'required',
            'auditee_user_id' => 'required',
            'auditor_user_id' => 'required|different:auditee_user_id',
            'auditor_lead_user_id' => 'required|different:auditee_user_id',
            'tanggal' => 'required|date_format:m-d-Y|after_or_equal:today',
            'waktu' => 'required|date_format:H:i:s',
            'klausul_id' => 'required'
        ];

        // check if user kadept

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        $tanggal =  Carbon::createFromFormat('m-d-Y', $request->tanggal)->format('Y-m-d');
        $waktu =  Carbon::createFromFormat('H:i:s', $request->waktu)->format('H:i:s');

        $auditplan->update([
            'departemen_id' => $request->departemen_id,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'auditee_user_id' => $request->auditee_user_id,
            'auditor_user_id' => $request->auditor_user_id,
            'auditor_lead_user_id' => $request->auditor_lead_user_id,
        ]);

        if ($request->has('klausul_id')) {
            $auditplan->klausuls()->sync($request->klausul_id);
        }

        $redirect_to = ['redirect_to' => route('auditplan.index')];

        session()->flash('message', 'Audit Plan successfully updated!');
        session()->flash('alert-type', 'success');

        return response()->json($redirect_to);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditPlan $auditplan)
    {
        try {
            //code...
            $auditplan->delete();
            $auditplan->klausuls()->sync([]);
            session()->flash('message', 'Audit Plan successfully deleted!');
            session()->flash('alert-type', 'error');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('message', 'Data tidak bisa dihapus!');
            session()->flash('alert-type', 'error');
        }

        $redirect_to = ['redirect_to' => route('auditplan.index')];
        return response()->json($redirect_to);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AuditPlan $auditplan)
    {
        $model = AuditPlan::with([
            'departemen', 'departemen.kadept', 'klausuls', 'auditee', 'auditor', 'auditorLead'
        ])->findOrFail($auditplan->id);

        return view('pages.auditplan.show', compact([
            'model'
        ]));
    }

    public function approved(AuditPlan $auditplan)
    {
        $user = auth()->user();
        $check = $auditplan->whereHas('departemen', function($q) use ($user) {
            $q->where('departemen.kadept_user_id', $user->id);
        })->exists();

        if (!$check && !($user->hasAnyRole(['admin']))) {
            return abort(422, 'Unauthorized action.');
        }

        $auditplan->update([
            'approval_kadept' => 1
        ]);

        session()->flash('message', 'Audit Plan '. $auditplan->id . ' telah diapproved!');
        session()->flash('alert-type', 'success');

        $redirect_to = ['redirect_to' => route('auditplan.index')];
        return response()->json($redirect_to);
    }


    public function report(Request $request, AuditPlan $auditplan)
    {
        $temuanaudits = TemuanAudit::where('audit_plan_id', $auditplan->id)->get();

        return view('auditplan.report.index', compact(['auditplan', 'temuanaudits']));
    }

    public function print(AuditPlan $auditplan)
    {
        $temuanaudits = TemuanAudit::where('audit_plan_id', $auditplan->id)->get();

        return view('auditplan.report.print', compact(['auditplan', 'temuanaudits']));
    }

    public function pdf(AuditPlan $auditplan)
    {
        // dd(storage_path('fonts/'));
        $temuanaudits = TemuanAudit::where('audit_plan_id', $auditplan->id)->get();
        $pdf = PDF::loadView('auditplan.report.print', compact(['auditplan', 'temuanaudits']))->setPaper('a4', 'landscape');;
        $pdfname = $auditplan->objektif_audit . '_' . Carbon::now() . '.pdf';

        return $pdf->download($pdfname);
    }

    public function addTemuanaudit(Auditplan $auditplan)
    {
        $data = AuditPlan::with('klausuls')->find($auditplan->id);
        // $klausuls = $data->klausuls->pluck('nama', 'id');
        $klausuls = [];
        foreach ($data->klausuls as $klausul) {

            $match = ['audit_plan_id' => $data->id, 'klausul_id' => $klausul->id];
            $exists = TemuanAudit::where($match)->exists();
            if (!$exists) {
                $klausuls[$klausul->id] = $klausul->nama;

            }
        }

        return view('pages.auditplan.temuan-form', compact(['auditplan', 'klausuls']));
    }

    public function datatable()
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
                // $model = AuditPlan::whereHas('auditee', function ($q) use ($user) {
                //     $q->where('id', $user->id);
                // })->with([
                //     'departemen', 'auditee', 'auditor', 'auditorLead', 'klausuls'
                // ])->get();
                # code...
                break;
        }

        return DataTables::of($model)
            ->addColumn('departemen', function ($model) {
                return $model->departemen->nama;
            })
            ->addColumn('auditee', function ($model) {
                return $model->auditee->nama;
            })
            ->addColumn('auditor', function ($model) {
                return $model->auditor->nama;
            })
            ->addColumn('auditor_lead', function ($model) {
                return $model->auditorLead->nama;
            })
            ->addColumn('klausul', function ($model) {
                return $model->klausuls()->count();
            })
            ->addColumn('action', function ($model) {
                return view('pages.auditplan.action', [
                    'model' => $model,
                    'url_temuanaudit' => route('auditplan.temuanaudit-add', $model->id),
                    'url_show' => route('auditplan.show', $model->id),
                    'url_approve' => route('auditplan.approved', $model->id),
                    'url_edit' => route('auditplan.edit', $model->id),
                    'url_destroy' => route('auditplan.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
