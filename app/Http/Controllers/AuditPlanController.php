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
        // session()->flush();
        return view('pages.auditplan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new AuditPlan();
        $departemen = Departemen::pluck('kode','id');
        $klausul = Klausul::pluck('nama', 'id');
        $auditee = User::pluck('nama', 'id');
        $auditor = User::role($this->auditorRoles)->pluck('nama', 'id');
        $auditorLead = User::role($this->auditorLeadRoles)->pluck('nama', 'id');
        // dd($departement);
        return view('pages.auditplan.create', compact([
            'model',
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
    public function edit($id)
    {
        $model = AuditPlan::findOrFail($id);
        $auditee = User::with('roles')->pluck('name', 'id');
        $auditor = User::role($this->auditorRoles)->pluck('name', 'id');
        $auditorLeader = User::role($this->auditorLeaderRoles)->pluck('name', 'id');
        $departement = Departement::all();
        // dd($kadept);
        return view('auditplan.create', compact(['model', 'departement', 'auditee', 'auditor', 'auditorLeader']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $model = AuditPlan::findOrFail($id);

        $this->validate($request, [
            'objektif_audit' => 'required|string|max:255|unique:audit_plans,objektif_audit,' . $model->id,
            'klausul' => 'required|string|max:100',
            'departement_id' => 'required',
            'auditee_id' => 'required',
            'auditor_id' => 'required|different:auditee_id',
            'auditor_leader_id' => 'required|different:auditee_id',
            'tanggal' => 'required|date_format:m-d-Y',
            'waktu' => 'required|date_format:H:i:s',
        ]);

        $tanggal =  Carbon::createFromFormat('m-d-Y', $request->tanggal)->format('Y-m-d');
        $waktu =  Carbon::createFromFormat('H:i:s', $request->waktu)->format('H:i:s');

        $model->update([
            'objektif_audit' => $request->objektif_audit,
            'klausul' => $request->klausul,
            'departement_id' => $request->departement_id,
            'auditee_id' => $request->auditee_id,
            'auditor_id' => $request->auditor_id,
            'auditor_leader_id' => $request->auditor_leader_id,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
        ]);

        $notification = [
            'message' => 'Audit Plan successfully updated!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = AuditPlan::findOrFail($id);
        $model->delete();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $auditplan = AuditPlan::findOrFail($id);

        return view('auditplan.confirm', compact(['auditplan']));
    }

    public function getDepartements($id)
    {
        $data = AuditPlan::where('departement_id', $id)->where('approval', 2)->get();
        return $data;
    }

    public function confirm(Request $request, $id)
    {

        $auditplan = AuditPlan::findOrFail($id);

        switch ($request->action) {
            case 'pending':
                $auditplan->update([
                    'approval' => 0,
                    'remarks' => $request->remarks
                ]);

                break;
            case 'reschedule':
                $this->validate($request, [
                    'new_tanggal' => 'required|date_format:m-d-Y',
                    'new_waktu' => 'required|date_format:H:i:s',
                    'remarks' => 'required|string'
                ]);

                $new_tanggal =  Carbon::createFromFormat('m-d-Y', $request->new_tanggal)->format('Y-m-d');
                $new_waktu =  Carbon::createFromFormat('H:i:s', $request->new_waktu)->format('H:i:s');

                $auditplan->update([
                    'tanggal' => $new_tanggal,
                    'waktu' => $new_waktu,
                    'remarks' => $request->remarks,
                    'approval' => 1,
                ]);

                break;
            case 'approve':
                $auditplan->update([
                    'approval' => 2,
                    'remarks' => $request->remarks
                ]);

                break;
            case 'reject':
                $this->validate($request, [
                    'remarks' => 'required|string'
                ]);
                $auditplan->update([
                    'approval' => 3,
                    'remarks' => $request->remarks
                ]);
                break;
        }

        $notification = [
            'message' => 'Audit Plan successfully updated!',
            'alert-type' => 'info'
        ];

        if ($request->has('redirect_to')) {
            return redirect($request->redirect_to)->with($notification);
        }
        return redirect()->back()->with($notification);
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

    public function datatable()
    {
        $model = AuditPlan::all();
        // $klausuls = $model->klausuls()->get();
        // $model = Klausul::first();

        // dd($model->klausuls()->count());


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
                return view('auditplan.action', [
                    'model' => $model,
                    'url_print' => route('auditplan.report', $model->id),
                    'url_show' => route('auditplan.show', $model->id),
                    'url_edit' => route('auditplan.edit', $model->id),
                    'url_destroy' => route('auditplan.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
