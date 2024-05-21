<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function userRegister(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'fullname' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|unique:profiles,email',
            'password' => 'required',
            // 'profileImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profileImage = $request->file('profileImage');
        $imageName = time() . '_' . $profileImage->getClientOriginalName();
        $profileImage->move(public_path('profile_images'), $imageName);


        Profiles::create([
            'full_name' => $request->input('fullname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'profile' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Profile created successfully!');
    }
}
