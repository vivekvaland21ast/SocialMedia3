<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Auth;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    
    public function store(Request $request)
    {
        // $request->validate([
        //     'body' => 'required|string',
        //     'post_id' => 'required|exists:posts,id',
        //     'parent_id' => 'nullable|exists:comments,id'
        // ]);

        $comment = Comments::create([
            'body' => $request->body,
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'parent_id' => $request->parent_id
        ]);

        return response()->json($comment, 201);
    }

    public function show($id)
    {
        $comments = Comments::with('user', 'replies.user')->where('post_id', $id)->whereNull('parent_id')->get();

        return response()->json($comments);
    }

    public function update(Request $request, $id)
    {
        $comment = Comments::findOrFail($id);

        // $this->authorize('update', $comment);

        $request->validate(['body' => 'required|string']);

        $comment->update(['body' => $request->body]);

        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = Comments::findOrFail($id);

        // $this->authorize('delete', $comment);

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
