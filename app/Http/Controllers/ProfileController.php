<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        if ($user->id === auth()->user()->id) {
            return view('pages.profile.show', compact('user'));
        } else {
            return back();
        }
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:50',
            'email' => 'required|string|max:50|unique:user,email,' . $user->id,
            'tanggal_masuk' => 'nullable|date_format:m-d-Y',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'phone' => $request->phone,
            'pendidikan' => $request->pendidikan,
        ];


        if ($request->has('tanggal_masuk') && !empty($request->tanggal_masuk)) {
            $tanggal_masuk = Carbon::createFromFormat('m-d-Y', $request->tanggal_masuk)->format('Y-m-d');
            $data['tanggal_masuk'] = $tanggal_masuk;
        }

        // update user
        $user->update($data);

        $notification = [
            'message' => 'Data berhasil disimpan!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }

    public function changePassword(Request $request, User $user)
    {
        $request->only('current_password', 'new_password', 'confirm_password');

        $data = $this->validate($request, [
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!\Hash::check($value, $user->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                },
            ],
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user->update([
            'password' => Hash::make($data['new_password'])
        ]);

        $notification = [
            'message' => 'Password berhasil disimpan!',
            'alert-type' => 'info'
        ];

        return redirect()->back('app')->with($notification);
    }
}
