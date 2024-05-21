<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Auth;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Request $request)
    {

        Comments::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'body' => $request->body,
        ]);

        return response()->json(['message' => 'Comment added successfully.']);
    }

    public function fetchComments($postId)
    {
        $comments = Comments::where('post_id', $postId)->with('user')->get()->map(function ($comment) {
            $comment->user->profile_url = asset('profile_images/' . $comment->user->profile);
            return $comment;
        });
        return response()->json($comments);
    }

    public function update(Request $request, Comments $comment)
    {
        // $this->authorize('update', $comment);

        // $request->validate([
        //     'body' => 'required|string|max:255',
        // ]);

        $comment->update([
            'body' => $request->body,
        ]);

        return response()->json($comment);
    }

    public function destroy(Comments $comment)
    {
        // $this->authorize('delete', $comment);

        $comment->delete();

        return response()->json(['message' => 'Comment deleted']);
    }
}
