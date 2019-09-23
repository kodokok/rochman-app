<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DataTables;

class RolesController extends Controller
{
    public function index()
    {
        return view('roles.index');
    }

    public function create()
    {
        $auth_guard = array_keys(config('auth.guards'));
        $guards = [];
        foreach ($auth_guard as $key => $value) {
            $guards[$value] = $value;
        }
        return view('roles.form', compact(['guards']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20|unique:roles,name',
            'guard_name' => 'required'
        ]);

        Role::firstOrCreate([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);
    }

    public function destroy(Role $role)
    {
        $role->delete();
    }

    public function dataTable()
    {
        $model = Role::all();
        return DataTables::of($model)
            ->addColumn('users', function ($model) {
                return User::role($model->name)->count();
            })
            ->addColumn('action', function ($model) {
                return view('layouts.partials._action', [
                    'model' => $model,
                    'url_show' => null,
                    'url_edit' => null,
                    'url_destroy' => route('roles.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
