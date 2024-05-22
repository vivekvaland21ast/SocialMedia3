<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Posts;
use App\Notifications\LikeNotification;
use Auth;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function toggleLike(Request $request)
    {
        $postId = $request->post_id;
        $userId = auth()->id();
        $post = Posts::find($postId);

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

            $postOwner = $post->profile;
            $liker = Auth::user();
            $postOwner->notify(new LikeNotification($post, $liker));
            $liked = true;
        }

        $totalLikes = Likes::where('post_id', $postId)->count();
        return response()->json(['total_likes' => $totalLikes, 'liked' => $liked]);
    }
    // public function archive(Request $request)
    // {
    //     try {
    //         $post = Posts::findOrFail($request->post_id);
    //         // $postId = $request->postId;
    //         $post->archive = true;
    //         $post->save();
    //         return response()->json(['success' => true]);
    //     } catch (\Exception $e) {
    //         Log::error('errordfgdfg', $e->getMessage());
    //         Log::error('request', $request->all());
    //         return response()->json(['error' => false], 500);
    //     }

    // }
}
