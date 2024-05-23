<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\Posts;
use App\Models\Profiles;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function showProfile()
    {
        $userId = Auth::id();

        $posts = Posts::with('profile')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
        $friendCount = Friends::where('user_id', auth()->id())->count();
        $notification = auth()->user()->notifications;
        // return response()->json(['friendCount' => $friendCount]);
        return view('pages.profile', compact('posts', 'friendCount', 'notification'));
        // return $posts;
    }

    public function updateProfile(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'profileImage' => 'image|mimes:jpg,jpeg,png|max:2048',
            'fullname' => 'required|string|min:2',
            'username' => 'required|string|min:2|unique:profiles,username,' . auth()->user()->id,
            'email' => 'required|email|unique:profiles,email,' . auth()->user()->id,
            // 'oldPassword' => 'required_with:newPassword|string|min:6',
            'newPassword' => 'nullable|string|min:6',
        ]);

        // Find the authenticated user's profile
        $profile = Profiles::find(auth()->user()->id);

        // Update profile details
        $profile->full_name = $request->input('fullname');
        $profile->username = $request->input('username');
        $profile->email = $request->input('email');

        // Update password if new password is provided
        if ($request->filled('newPassword')) {
            // Check if the old password matches
            if (!Hash::check($request->input('oldPassword'), $profile->password)) {
                return redirect()->back()->with('error', 'Old password does not match.');
            }
            // Update the password
            $profile->password = Hash::make($request->input('newPassword'));
        }

        // Handle profile image upload
        if ($request->hasFile('profileImage')) {
            $profileImage = $request->file('profileImage');
            $imageName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->move(public_path('profile_images'), $imageName);
            $profile->profile = $imageName;

            // $profileImage = $request->file('profileImage');
            // $imageName = time() . '_' . $profileImage->getClientOriginalName();
            // $profileImage->move(public_path('profile_images'), $imageName);
        }
        // dd($profile);

        // Save the changes
        $profile->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    // old
    // public function updateProfile(Request $request)
    // {

    //     $profile = Profiles::find(auth()->user()->id);

    //     $profile->full_name = $request->input('fullname');
    //     $profile->username = $request->input('username');
    //     $profile->email = $request->input('email');

    //     // Update password if new password is provided
    //     if ($request->filled('newPassword')) {
    //         // Update the password
    //         $profile->password = Hash::make($request->input('newPassword'));
    //     }

    //     // Handle profile image upload
    //     if ($request->hasFile('profileImage')) {

    //         if ($request->filled('newPassword')) {

    //             $profile->password = Hash::make($request->input('newPassword'));
    //         }

    //         if ($request->hasFile('profileImage')) {

    //             $profileImage = $request->file('profileImage');
    //             $imageName = time() . '_' . $profileImage->getClientOriginalName();
    //             $profileImage->move(public_path('profile_images'), $imageName);
    //         }

    //         // Save the changes
    //         $profile->save();

    //         // Redirect back with success message
    //         $profile->save();

    //         return redirect()->back()->with('success', 'Profile updated successfully.');
    //     }
    // }
}
