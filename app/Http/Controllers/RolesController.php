<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DataTables;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index()
    {
        return view('pages.roles.index');
    }

    public function create()
    {
        $auth_guard = array_keys(config('auth.guards'));
        $guards = [];
        foreach ($auth_guard as $key => $value) {
            $guards[$value] = $value;
        }
        return view('pages.roles.form', compact(['guards']));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|alpha_dash|max:20|unique:roles,name',
            'guard_name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        Role::firstOrCreate([
            'name' => strtolower($request->name),
            'guard_name' => $request->guard_name
        ]);

        return response()->json(['success' => 'success'], 200);
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();

            session()->flash('message', 'Data berhasil dihapus!');
            session()->flash('alert-type', 'success');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('message', 'Data tidak bisa dihapus!');
            session()->flash('alert-type', 'error');
        }

        $redirect_to = ['redirect_to' => route('roles.index')];
        return response()->json($redirect_to);
    }

    public function datatable()
    {
        $model = Role::all();
        return DataTables::of($model)
            ->addColumn('users', function ($model) {
                return User::role($model->name)->count();
            })
            ->addColumn('action', function ($model) {
                return view('partials.table-action.roles', [
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
