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
        // return response()->json(['friendCount' => $friendCount]);
        return view('pages.profile', compact('posts', 'friendCount'));
        // return $posts;
    }
    public function updateProfile(Request $request)
    {

        $profile = Profiles::find(auth()->user()->id);

        $profile->full_name = $request->input('fullname');
        $profile->username = $request->input('username');
        $profile->email = $request->input('email');

        // Update password if new password is provided
        if ($request->filled('newPassword')) {
            // Update the password
            $profile->password = Hash::make($request->input('newPassword'));
        }

        // Handle profile image upload
        if ($request->hasFile('profileImage')) {

            if ($request->filled('newPassword')) {

                $profile->password = Hash::make($request->input('newPassword'));
            }

            if ($request->hasFile('profileImage')) {

                $profileImage = $request->file('profileImage');
                $imageName = time() . '_' . $profileImage->getClientOriginalName();
                $profileImage->move(public_path('profile_images'), $imageName);
            }

            // Save the changes
            $profile->save();

            // Redirect back with success message
            $profile->save();

            return redirect()->back()->with('success', 'Profile updated successfully.');
        }
    }
}
