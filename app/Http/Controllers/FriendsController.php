<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\Posts;
use App\Models\Profiles;
use Auth;
use Illuminate\Http\Request;

class FriendsController extends Controller
{

    public function toggleFriend(Request $request)
    {
        $friendId = $request->friend_id;
        $userId = auth()->id();

        // Check if the user is already a friend
        $isFriend = Friends::where('friend_id', $friendId)
            ->where('user_id', $userId)
            ->exists();

        // Toggle friend status
        if ($isFriend) {
            // If already a friend, remove
            Friends::where('friend_id', $friendId)
                ->where('user_id', $userId)
                ->delete();
            $message = 'Friend removed successfully.';
        } else {
            // If not a friend, add
            Friends::create([
                'user_id' => $userId,
                'friend_id' => $friendId
            ]);
            $message = 'Friend added successfully.';
        }

        return response()->json(['message' => $message]);
    }

    public function showFriends()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Retrieve the user's friends
        $friends = $user->friends; // Assuming 'friends' is the relationship defined in the User model

        // Pass the friends to the view
        return view('friends', ['friends' => $friends]);
    }
    public function fetchFriends()
    {
        $user = Auth::user();
        $friends = $user->friends; // Assuming you have a relationship defined on the User model
        return response()->json(['friends' => $friends]);
    }
    // public function archive($id)
    // {
    //     $post = Posts::find($id);
    //     if ($post) {
    //         $post->archive = true;
    //         $post->save();
    //         return response()->json(['success' => 'Post archived successfully!']);
    //     }
    //     return response()->json(['error' => 'Post not found!'], 404);
    // }
}
