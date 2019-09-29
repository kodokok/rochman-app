<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        // $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // $user = auth()->user();

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

        $notification = [
            'message' => 'User successfully updated!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }

    public function editPassword(Request $request, User $user)
    {
        return view('profile.password.index', compact(['user']));
    }

    public function changePassword(Request $request, User $user)
    {
        $request->only('old_password', 'new_password', 'confirm_password');
        // dd($user);
        $data = $this->validate($request, [
            'old_password' => [
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
            'message' => 'Password successfully updated!',
            'alert-type' => 'info'
        ];

        return redirect()->back('app')->with($notification);
    }
}
