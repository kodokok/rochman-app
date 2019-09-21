<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserProfileController extends Controller
{
    public function show(User $user)
    {
        return view('users.profile.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // grab data
        $data = $request->only(['name', 'email']);

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100|unique:users,email,' . $user->id
        ]);

        // update users
        $user->update($data);

        return redirect()->back();
    }
}
