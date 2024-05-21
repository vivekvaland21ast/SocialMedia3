<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Posts;
use Auth;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function toggleLike(Request $request)
    {
        $postId = $request->post_id;
        $userId = auth()->id();

        $like = Likes::where('post_id', $postId)
            ->where('user_id', $userId)
            ->first();

        $liked = false;

        if ($like) {
            $like->delete();
        } else {

            Likes::create([
                'user_id' => $userId,
                'post_id' => $postId
            ]);
            $liked = true;
        }

        $totalLikes = Likes::where('post_id', $postId)->count();
        return response()->json(['total_likes' => $totalLikes, 'liked' => $liked]);
    }

}
