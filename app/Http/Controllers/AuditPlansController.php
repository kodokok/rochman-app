<?php

namespace App\Http\Controllers;

use App\AuditPlan;
use App\Departement;
use App\User;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class AuditPlansController extends Controller
{
    protected $auditeeRoles = ['auditee', 'auditor', 'auditor_leader', 'admin'];
    protected $auditorRoles = ['auditor', 'auditor_leader', 'admin'];
    protected $auditorLeaderRoles =  ['auditor_leader', 'admin'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auditplan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new AuditPlan();
        $auditee = User::with('roles')->pluck('name', 'id');
        $auditor = User::role($this->auditorRoles)->pluck('name', 'id');
        $auditorLeader = User::role($this->auditorLeaderRoles)->pluck('name', 'id');
        $departement = Departement::all();
        // dd($departement);
        return view('auditplan.create', compact(['model', 'departement', 'auditee', 'auditor', 'auditorLeader']));
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
            'objektif_audit' => 'required|string|max:255|unique:audit_plans,objektif_audit',
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

        AuditPlan::create([
            'objektif_audit' => $request->objektif_audit,
            'klausul' => $request->klausul,
            'departement_id' => $request->departement_id,
            'approval' => 0,
            'auditee_id' => $request->auditee_id,
            'auditor_id' => $request->auditor_id,
            'auditor_leader_id' => $request->auditor_leader_id,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
        ]);

        return redirect(route('auditplan.index'));
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

        return redirect(route('auditplan.index'));
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
    public function show($id)
    {
        $auditPlan = AuditPlan::findOrFail($id);
        // $approval = $this->approvalStatus[$auditPlan->approval];
        // dd($auditPlan->approval);
        return view('auditplan.confirm', compact(['auditPlan']));
    }

    public function getDepartements($id)
    {
        $data = AuditPlan::where('departement_id', $id)->where('approval', 2)->get();
        return $data;
    }

    public function confirm(Request $request, $id)
    {

        $auditPlan = AuditPlan::findOrFail($id);

        switch ($request->action) {
            case 'pending':
                $auditPlan->update([
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

                $auditPlan->update([
                    'tanggal' => $new_tanggal,
                    'waktu' => $new_waktu,
                    'remarks' => $request->remarks,
                    'approval' => 1,
                ]);

                break;
            case 'approve':
                $auditPlan->update([
                    'approval' => 2,
                    'remarks' => $request->remarks
                ]);

                break;
            case 'reject':
                $this->validate($request, [
                    'remarks' => 'required|string'
                ]);
                $auditPlan->update([
                    'approval' => 3,
                    'remarks' => $request->remarks
                ]);

                break;
        }

        return redirect(route('auditplan.index'));
    }

    public function dataTable()
    {
        $model = AuditPlan::all();

        return DataTables::of($model)
            ->addColumn('departement', function ($model) {
                return $model->departement->name;
            })
            ->addColumn('auditee', function ($model) {
                return $model->auditee->name;
            })
            ->addColumn('auditor', function ($model) {
                return $model->auditor->name;
            })
            ->addColumn('auditor_leader', function ($model) {
                return $model->auditorLeader->name;
            })
            ->addColumn('temuan', function ($model) {
                return $model->temuanaudits->count();
            })
            ->addColumn('action', function ($model) {
                return view('auditplan.action', [
                    'model' => $model,
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
