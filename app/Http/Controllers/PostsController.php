<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Profiles;
use Auth;
use Hash;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Posts::with('profile', 'likes')->where('archive', false)->orderBy('created_at', 'desc')->get();
        $posts = Posts::with('profile', 'likes')->orderBy('created_at', 'desc')->where('archive', '0')->get();
        $friends = Profiles::where('id', '!=', Auth::id())->get();
        $notification = auth()->user()->notifications;
        // $user = auth()->user();
        // $user = Auth::id();
        // dd($user->id);
        // $notification = $user->notifications()->where('id', '!=', Auth::id())->get();
        // dd($notification);
        return view('index', compact('posts', 'friends', 'notification'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageName = null;


        if ($request->hasFile('imageFile')) {

            $imageName = time() . '_' . $request->file('imageFile')->getClientOriginalName();
            $request->file('imageFile')->move(public_path('post_images'), $imageName);
        }


        $post = new Posts();
        $post->post_caption = $request->input('captionText', '');
        $post->post_image = $imageName;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->back()->with('success', 'Post created successfully.');
    }

    // public function store(Request $request)
    // {
    //     $imageName = null;

    //     if ($request->hasFile('imageFile')) {
    //         $imageName = time() . '_' . $request->file('imageFile')->getClientOriginalName();
    //         $request->file('imageFile')->move(public_path('post_images'), $imageName);
    //     }

    //     $post = new Posts();
    //     $post->post_caption = $request->input('captionText', '');
    //     $post->post_image = $imageName;
    //     $post->user_id = auth()->id();
    //     $post->save();

    //     // Return JSON response with success and post data
    //     return response()->json([
    //         'success' => true,
    //         'post' => $post, // Send the newly created post data
    //     ]);
    // }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $post = Posts::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        $post->post_caption = $request->captionText;
        if ($request->hasFile('imageFile')) {
            $file = $request->file('imageFile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('post_images'), $fileName);
            $post->post_image = $fileName;
        }
        $post->save();
        return redirect('/profile');
    }

    public function destroy(string $id)
    {
        $post = Posts::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('profile')->with('success', 'Post deleted successfully');
        } else {
            return redirect()->route('profile')->with('error', 'Post not found');
        }
    }

    public function archive(Request $request)
    {
        try {
            $post = Posts::findOrFail($request->post_id);
            // $postId = $request->postId;
            $post->archive = true;
            $post->save();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log::error('errordfgdfg', $e->getMessage());
            // Log::error('request', $request->all());
            return response()->json(['error' => false], 500);
        }

    }

    public function unarchive($id)
    {
        $post = Posts::findOrFail($id);
        $post->archive = false;
        $post->save();

        return response()->json(['message' => 'Post unarchived successfully']);
    }


}
