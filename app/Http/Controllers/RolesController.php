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

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20|unique:roles,name'
        ]);

        Role::firstOrCreate(['name' => $request->name]);
    }

    public function destroy(Role $role)
    {
        $role->delete();
    }
}
