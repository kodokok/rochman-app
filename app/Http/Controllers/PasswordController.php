<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        // dd(auth()->user());
        return view('users.password.change');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $data = $request->all();
        $user = auth()->user();

        // dd($data);
        if (Hash::check($data['old_password'], $user->password)) {
            return back()->with('error', 'You have entered wrong password');
        }

        $user->update([
            'password' => $data['new_password']
        ]);
    }
}
