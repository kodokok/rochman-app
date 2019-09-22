<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(User::findOrFail(1)->isOnline());
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new User();
        $roles = Role::pluck('name','id')->all();

        return view('users.form', compact(['model', 'roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100|unique:users,email',
            'image' => 'nullable|image',
            'password' => 'required|min:6',
        ]);

        $model = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // upload image to the storage
        if ($request->hasFile('image')) {
            $image = $request->image->store('img\users');

            $model->update([
                'image' => $image
            ]);
        }

        //Retrieving the roles field
        $roles = $request['roles'];
        //Checking if a role was selected
        if (isset($roles)) {
            //Assigning role to user
            $model->assignRole($roles);
        }

        return $model;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $model = User::findOrFail($user->id);
        $roles = Role::pluck('name','id')->all();
        return view('users.form', compact(['model', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        // grab data
        $data = $request->only(['name', 'email']);

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100|unique:users,email,' . $user->id
        ]);

        // check if new image
        if ($request->hasFile('image')) {
            // upload image
            $image = $request->image->store('users');

            // delete image
            $user->deleteImage();

            // save new image to array
            $data['image'] = $image;
        }

        // update users
        $user->update($data);

        // get roles from input
        $roles = $request->input('roles');
        // if roles changed, sync the roles
        if ($roles) {
            $user->syncRoles($roles);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->deleteImage();
        $user->delete();
    }

    public function dataTable()
    {
        $model = User::all();

        return DataTables::of($model)
            ->addColumn('roles', function (User $user) {
                $roles = $user->roles->pluck('name')->all();
                return implode('', array_map(function ($role) {
                    return '<span class="badge badge-primary mr-2">'. $role .'</span>';
                }, $roles));
            })
            ->addColumn('status', function (User $user) {
                if ($user->isOnline()) {
                    return '<span class="badge badge-success">Online</span>';
                }
                return '<span class="badge badge-secondary">Offline</span>';
            })
            ->addColumn('action', function ($model) {
                return view('layouts.partials._action', [
                    'model' => $model,
                    'url_show' => null,
                    'url_edit' => route('users.edit', $model->id),
                    'url_destroy' => route('users.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['roles', 'status', 'action'])
            ->make(true);
    }
}
