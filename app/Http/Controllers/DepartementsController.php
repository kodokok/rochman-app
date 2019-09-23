<?php

namespace App\Http\Controllers;

use App\Departement;
use Illuminate\Http\Request;
use DataTables;
use App\User;

class DepartementsController extends Controller
{
    public function index()
    {
        return view('departements.index');
    }

    public function create()
    {
        $model = new Departement();
        $kadept = User::pluck('name','id')->all();;
        return view('departements.form', compact(['model','kadept']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash|max:40|unique:departements,name',
        ]);

        $model = Departement::create($request->all());

        return $model;
    }

    public function edit(Departement $departement)
    {
        $model = $departement;
        $kadept = User::pluck('name','id')->all();
        return view('departements.form', compact(['model', 'kadept']));
    }

    public function update(Request $request, Departement $departement)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash|max:40|unique:departements,name,' . $departement->id,
        ]);

        $departement->update($request->all());
    }

    public function destroy(Departement $departement)
    {
        $departement->delete();
    }

    public function dataTable()
    {
        $model = Departement::all();

        return DataTables::of($model)
            ->addColumn('kadept', function($model) {
                $user = Departement::find($model->id)->user;
                return $user ? $user->name : '';
            })
            ->addColumn('action', function ($model) {
                return view('layouts.partials._action', [
                    'model' => $model,
                    'url_show' => null,
                    'url_edit' => route('departements.edit', $model->id),
                    'url_destroy' => route('departements.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
