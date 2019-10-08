<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(User::findOrFail(1)->isOnline());
        return view('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $roles = Role::pluck('name','id')->all();

        return view('pages.user.create', compact(['user','roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required|string|max:50',
            'email' => 'required|string|max:50|unique:user,email',
            'password' => 'required|min:6',
            'tanggal_masuk' => 'nullable|date_format:m-d-Y',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'phone' => $request->phone,
            'pendidikan' => $request->pendidikan,
        ];

        if (!empty($request->tanggal_masuk)) {
            $tanggal_masuk = Carbon::createFromFormat('m-d-Y', $request->tanggal_masuk)->format('Y-m-d');
            $data['tanggal_masuk'] = $tanggal_masuk;
        }

        // upload image to the storage
        if ($request->hasFile('foto')) {
            $foto = $request->foto->store('img\user');

            $data['foto'] = $foto;
        }

        $user = User::create($data);

        //Retrieving the roles field
        $roles = $request['roles'];
        //Checking if a role was selected
        if (isset($roles)) {
            //Assigning role to user
            $user->assignRole($roles);
        }

        $notification = [
            'message' => 'Data berhasil disimpan!',
            'alert-type' => 'success'
        ];

        return redirect()->route('user.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name','id')->all();
        return view('pages.user.create', compact(['user', 'roles']));
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
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required|string|max:50',
            'email' => 'required|string|max:50|unique:user,email,' . $user->id,
            'password' => 'nullable|min:6',
            'tanggal_masuk' => 'nullable|date_format:m-d-Y',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'phone' => $request->phone,
            'pendidikan' => $request->pendidikan,
        ];

        if ($request->has('password') && !empty($request->password)) {

            dd($request->all());
            $data['password'] = Hash::make($data['password']);
        };

        if ($request->has('tanggal_masuk') && !empty($request->tanggal_masuk)) {
            $tanggal_masuk = Carbon::createFromFormat('m-d-Y', $request->tanggal_masuk)->format('Y-m-d');
            $data['tanggal_masuk'] = $tanggal_masuk;
        }

        // check if new image
        if ($request->hasFile('foto')) {
            // upload image
            $foto = $request->foto->store('img\user');

            // delete image
            $user->deleteFoto();

            // save new image to array
            $data['foto'] = $foto;
        }

        // update user
        $user->update($data);

        // get roles from input
        $roles = $request->input('roles');
        // if roles changed, sync the roles
        if ($roles) {
            $user->syncRoles($roles);
        }

        $notification = [
            'message' => 'Data berhasil disimpan!',
            'alert-type' => 'info'
        ];

        return redirect()->route('user.index')->with($notification);
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
        $user->deleteFoto();
        $user->delete();
    }

    public function datatable()
    {
        $model = User::all();

        return DataTables::of($model)
            ->addColumn('roles', function (User $user) {
                $roles = $user->roles->pluck('name')->all();
                return implode('', array_map(function ($role) {
                    return '<span class="badge badge-primary mr-2">'. $role .'</span>';
                }, $roles));
            })
            ->addColumn('action', function ($model) {
                return view('partials.table-action.user', [
                    'model' => $model,
                    'url_show' => null,
                    'url_edit' => route('user.edit', $model->id),
                    'url_destroy' => route('user.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['roles', 'action'])
            ->make(true);
    }
}
