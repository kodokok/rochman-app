<?php

namespace App\Http\Controllers;

use App\KompetensiAuditor;
use App\User;
use DataTables;
use Illuminate\Http\Request;

class KompetensiAuditorsController extends Controller
{
    protected $auditorRoles = ['auditor','auditor_leader'];

    public function index()
    {
        return view('kompetensi.index');
    }

    public function create()
    {
        $model = new KompetensiAuditor();
        $auditor = User::role($this->auditorRoles)->pluck('name', 'id');

        return view('kompetensi.form', compact(['model','auditor']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'masa_kerja' => 'nullable|integer',
        ]);

        // dd($request->tanggal_pelatihan);
        $model = KompetensiAuditor::create([
            'user_id' => $request->user_id,
            'pelatihan' => $request->pelatihan,
            'pendidikan' => $request->pendidikan,
            'masa_kerja' => $request->masa_kerja,
        ]);

        return $model;
    }

    public function edit($id)
    {
        $model = KompetensiAuditor::findOrFail($id);

        // dd($model->tanggal_pelatihan);
        $auditor = User::role($this->auditorRoles)->pluck('name', 'id');

        return view('kompetensi.form', compact(['model','auditor']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'masa_kerja' => 'nullable|integer'
        ]);

        $model = KompetensiAuditor::findOrFail($id);
        // dd($request->tanggal_pelatihan);
        $model->update([
            'user_id' => $request->user_id,
            'pelatihan' => $request->pelatihan,
            'pendidikan' => $request->pendidikan,
            'masa_kerja' => $request->masa_kerja,
        ]);

        return $model;
    }

    public function destroy($id)
    {
        $model = KompetensiAuditor::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = KompetensiAuditor::all();

        return DataTables::of($model)
            ->addColumn('auditor', function($model) {
                $user = KompetensiAuditor::find($model->id)->user;
                return $user ? $user->name : '';
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
