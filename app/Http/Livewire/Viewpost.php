<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\like;
use App\Models\comments;
use Carbon\CarbonInterface;

class Viewpost extends Component
{
    public $post_id;
    public $comment;
    public function mount($post_id)
    {
        $this->post_id = $post_id;
    }

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


    public function render()
    {
        $post = Post::find($this->post_id);
        return view('livewire.viewpost', ['post' => $post]);
    }
}
