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

    public function store()
    {
        # code...
    }

    public function edit(Departement $departement)
    {
        $model = $departement;
        $kadept = User::pluck('name','id')->all();
        return view('departements.form', compact(['model', 'kadept']));
    }

    public function update()
    {
        # code...
    }

    public function destroy()
    {
        # code...
    }

    public function dataTable()
    {
        $model = Departement::all();
        // dd(Departement::find(1)->user->name);

        return DataTables::of($model)
            ->addColumn('kadept', function($model) {
                return Departement::find($model->id)->user->name;
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
