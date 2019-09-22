<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('users.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100|unique:users,email,' . $user->id
        ]);

        // update users
        $user->update($request->all());

        return redirect()->back();
    }
}
