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
    protected $auditeeRoles = ['auditor','auditor_leader','admin'];
    protected $auditorRoles = ['auditor','auditor_leader','admin'];
    protected $auditorLeaderRoles =  ['auditor_leader','admin'];

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
        return view('auditplan.create', compact(['model','departement', 'auditee', 'auditor', 'auditorLeader']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'objektif_audit' => 'required|string|max:255',
            'klausul' => 'required|string|max:100',
            'departement_id' => 'required',
            'auditee_id' => 'required',
            'auditor_id' => 'required',
            'auditor_leader_id' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:' . Carbon::parse($request->waktu)->format('H:i:s'),
        ]);

        dd($request->all());
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
        return view('auditplan.create', compact(['model','departement', 'auditee', 'auditor', 'auditorLeader']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dataTable()
    {
        $model = AuditPlan::all();

        return DataTables::of($model)
            ->addColumn('departement', function ($model) {
                return $model->departement->name;
            })
            ->addColumn('auditee', function($model) {
                return $model->auditee->name;
            })
            ->addColumn('auditor', function($model) {
                return $model->auditor->name;
            })
            ->addColumn('auditor_leader', function($model) {
                return $model->auditorLeader->name;
            })
            ->addColumn('action', function ($model) {
                return view('layouts.partials._action-page', [
                    'model' => $model,
                    'url_show' => null,
                    'url_edit' => route('auditplan.edit', $model->id),
                    'url_destroy' => route('auditplan.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
