<?php

namespace App\Http\Controllers;

use App\KompetensiAuditor;
use App\User;
use DataTables;
use Illuminate\Http\Request;

class KompetensiAuditorController extends Controller
{
    protected $auditorRoles = ['auditor','auditor_lead','admin'];

    public function index()
    {
        return view('pages.kompetensi.index');
    }

    public function create()
    {
        $model = new KompetensiAuditor();
        $auditor = User::role($this->auditorRoles)->pluck('nama', 'id');

        return view('pages.kompetensi.form', compact(['model','auditor']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'nilai' => 'nullable|integer',
        ]);

        // dd($request->tanggal_pelatihan);
        $model = KompetensiAuditor::create($request->all());

        return $model;
    }

    public function edit(KompetensiAuditor $kompetensi)
    {
        $model = $kompetensi;

        // dd($model->tanggal_pelatihan);
        $auditor = User::role($this->auditorRoles)->pluck('nama', 'id');

        return view('pages.kompetensi.form', compact(['model','auditor']));
    }

    public function update(Request $request, KompetensiAuditor $kompetensi)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'nilai' => 'nullable|integer'
        ]);

        // $model = KompetensiAuditor::findOrFail($id);
        // dd($request->tanggal_pelatihan);
        $kompetensi->update([
            'user_id' => $request->user_id,
            'pelatihan' => $request->pelatihan,
            'nilai' => $request->nilai,
        ]);
    }

    public function destroy(KompetensiAuditor $kompetensi)
    {
        $kompetensi->delete();
    }

    public function datatable()
    {
        $model = KompetensiAuditor::all();
        // dd($model);
        return DataTables::of($model)
            ->addColumn('auditor', function($model) {
                return $model->user->nama;
            })
            ->addColumn('action', function ($model) {
                return view('layouts.partials._action', [
                    'model' => $model,
                    'url_show' => null,
                    'url_edit' => route('kompetensi.edit', $model->id),
                    'url_destroy' => route('kompetensi.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
