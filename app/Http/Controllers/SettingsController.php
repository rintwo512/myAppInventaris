<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{

    public function index()
    {
        return view('settings.profile', [
            'title' => 'Profile'
        ]);
    }

    public function updateUserAccount(Request $request, $id)
    {

        $rules = [
            'name' => 'required',
            'image' => 'image|file|max:1024'
        ];




        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }
            $validateData['image'] = $request->file('image')->store('user-images');
        }

        User::where('id', $id)
            ->update($validateData);

        return back()->with('success', 'Profile updated!');
    }

    public function changePassword()
    {
        return view('settings.changepassword', [
            'title' => 'Change Password'
        ]);
    }

    public function postChangePassword(Request $request, $id)
    {
        $userSet = User::where('id', $id)->first();

        $rules = [
            'changeOldPass' => 'required',
            'password' => 'required|min:4|confirmed'
        ];
        $oldPass = $request->changeOldPass;
        $newPass = $request->newPass;
        // dd($oldPass);

        if (!Hash::check($oldPass, $userSet->password)) {
            return back()->with('alert', 'password anda salah!');
        } else {
            if (Hash::check($newPass, $userSet->password)) {
                return back()->with('alert', 'password baru tidak boleh sama dengan password lama!');
            } else {

                $request->validate($rules);
                $data['password'] = bcrypt($request->password);


                User::where('id', $id)->update($data);
                return back()->with('success', 'Password berhasil diubah!');
            }
        }
    }
}
