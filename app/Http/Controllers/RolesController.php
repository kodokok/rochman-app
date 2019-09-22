<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        return view('roles.index');
    }

    public function create()
    {
        $guards = array_keys(config('auth.guards'));
        // dd($guards);
        return view('roles.form', compact('guards'));
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
}
