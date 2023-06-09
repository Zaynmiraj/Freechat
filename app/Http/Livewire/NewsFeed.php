<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use App\Models\Addfriend;
use App\Models\like;
use App\Models\comments;
use Illuminate\Http\Request;

class NewsFeed extends Component
{
    use WithFileUploads;
    public $status;
    public $image;
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







    public function AddStatus()
    {
        $user = Auth::user()->id;
        $post = new Post();
        $post->user_id = $user;
        $post->post_title = $this->status;
        if ($this->image) {
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('user/post/', $imageName);
            $post->post_image = $imageName;
        }
        $post->posted_time = DB::raw('current_date');
        $post->save();
        return redirect()->route('newsfeed');
    }

    public $hascomment;

    public function finds($id)
    {
        return $this->hascomment = comments::where('post_id', $id)->get();
    }
    public function render()
    {
        $posts = Post::whereIn('user_id', function ($query) {
            $query->select('friend_id')
                ->from('addfriends')
                ->where('user_id', Auth::user()->id);
        })
            ->orWhere('user_id', Auth::user()->id)
            ->with('user')
            ->orderBy('updated_at', 'DESC')->get();

        $likes = Like::select('user_id')->where('user_id', Auth::user()->id);







        return view('livewire.news-feed', [

            'posts' => $posts,
            'likes' => $likes,
            'hascomment' => $this->hascomment

        ]);
    }
}
