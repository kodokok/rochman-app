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
        $auditor = User::role($this->auditorRoles);;
        return view('kompetensi.form', compact(['model','auditor']));
    }

    public function store(Request $request)
    {

    }

    public function edit(Departement $departement)
    {

    }

    public function update(Request $request, Departement $departement)
    {

    }

    public function destroy(Departement $departement)
    {

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
