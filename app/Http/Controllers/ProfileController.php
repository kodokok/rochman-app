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
        $user = auth()->user();

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
            $request['image'] = $image;
        }

        // update users
        $user->update($request->all());

        return redirect()->back();
    }
}
