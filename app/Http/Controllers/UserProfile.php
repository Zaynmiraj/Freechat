<?php

namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class UserProfile extends Controller
{
    public function UpdateProfilePhoto()
    {
    }
    public function Comment($id)
    {
        $comment = Post::find($id);
        return response()->json($comment);
    }
    public function AddComment(Request $request)
    {
        $comment = new comments();
        $comment->post_id = $request->id;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();
    }
}
