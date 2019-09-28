<?php

namespace App\Http\Controllers;

use App\AuditPlan;
use App\Departement;
use App\TemuanAudit;
use Illuminate\Http\Request;
use DataTables;

class TemuanAuditsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('temuanaudit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new TemuanAudit();
        $departement = Departement::pluck('name', 'id');
        // dd($auditplans);
        return view('temuanaudit.create', compact(['model','departement']));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TemuanAudit  $temuanAudit
     * @return \Illuminate\Http\Response
     */
    public function show(TemuanAudit $temuanAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TemuanAudit  $temuanAudit
     * @return \Illuminate\Http\Response
     */
    public function edit(TemuanAudit $temuanAudit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TemuanAudit  $temuanAudit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TemuanAudit $temuanAudit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TemuanAudit  $temuanAudit
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemuanAudit $temuanAudit)
    {
        //
    }

    public function dataTable()
    {
        $model = TemuanAudit::all();
        // $model = TemuanAudit::findOrFail(1)->get();
        // dd($model->audit_plan->objektif_audit);

        return DataTables::of($model)
            ->addColumn('auditplan_objectif_audit', function ($model) {
                return $model->audit_plan->objektif_audit;
            })
            ->addColumn('action', function ($model) {
                return view('temuanaudit.action', [
                    'model' => $model,
                    'url_show' => route('temuanaudit.show', $model->id),
                    'url_edit' => route('temuanaudit.edit', $model->id),
                    'url_destroy' => route('temuanaudit.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
