<?php

namespace App\Http\Livewire;

use App\Models\Addfriend;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\comments;
use App\Models\like;

class ViewProfile extends Component
{
    public $profile_id;
    public $follows;

    public function mount($profile_id)
    {
        $this->profile_id = $profile_id;
    }

    public $like;
    public $comment;
    public $post_id;


    public function like($id)
    {
        $like = new Like();
        $like->post_id = $id;
        $like->user_id = Auth::user()->id;
        $like->like = 1;
        $like->save();
        $this->emit('liked');
    }
    public function MakeComment($id)
    {
        $comment = new comments();
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->comment = $this->comment;
        $comment->save();
        $this->comment = "";
    }

    public function dislike($id, $user_id)
    {

        $like = Like::on()->where('post_id', $id)->where('user_id', $user_id);
        $like->delete();
    }

    public function getAddFriend($id)
    {
        $user = User::find($id);
        Auth::user()->addFriend($user);
        return redirect()->back();
    }

    public function getRemoveFriend($id)
    {
        $user = User::find($id);
        Auth::user()->removeFriend($user);
        return redirect()->back();
    }

    public function render()
    {
        $not_friends = User::where('id', '!=', Auth::user()->id);
        if (Auth::user()->friends->count()) {
            $not_friends->whereNotIn('id', Auth::user()->friends->modelKeys());
        }
        $not_friends = $not_friends->get();

        $users = User::find($this->profile_id);

        $post = Post::where('user_id', $this->profile_id);

        $posts = $post->orderBy('created_at', 'DESC')->get();

        $follower = Addfriend::where('friend_id', $this->profile_id)->count();

        $not = Addfriend::where('friend_id', $this->profile_id)->first();

        $follow = Addfriend::where('user_id', $this->profile_id)->count();
        return view(
            'livewire.view-profile',
            [
                'not' => $not,
                'users' => $users,
                'addfriend' => $not_friends,
                'follower' => $follower,
                'follow' => $follow,
                'posts' => $posts,
            ]
        );
    }
}
