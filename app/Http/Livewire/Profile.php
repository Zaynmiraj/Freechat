<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Addfriend;
use App\Models\UserInfo;
use Image;
use App\Models\Post;
use App\Models\like;

class Profile extends Component
{
    use WithFileUploads;
    public $image;
    public $cover;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'image' => 'required',
            'cover' => 'required',
        ]);
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

    public function dislike($id, $user_id)
    {

        $like = Like::on()->where('post_id', $id)->where('user_id', $user_id);
        $like->delete();
    }



    public function ProfilePhotoUpdate()
    {
        $this->validate([
            'image' => 'required',
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $profile = $this->image;
        // $fileName = $profile->getClientOriginalName();
        $profileResize = Image::make($profile->getRealPath());
        $profileResize->resize(1000, 1000);
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $profileResize->save(public_path('user/user/' . $imageName));
        $user->profile_photo_path = $imageName;
        $user->save();
        return redirect()->route('profile');
        session()->flash('success', 'profile updated');
    }


    public function CoverPhotoUpdate()
    {
        $this->validate([
            'cover' => 'required',
        ]);
        $id = Auth::user()->id;
        $post = new Post();
        $cover = UserInfo::find($id);
        $imageName = Carbon::now()->timestamp . '.' . $this->cover->extension();
        $this->cover->storeAs('user/cover-photo', $imageName);
        $cover->cover = $imageName;
        $this->cover->storeAs('user/post', $imageName);
        $post->post_image = $imageName;
        $post->user_id = $id;
        $post->save();
        $cover->save();
        return redirect()->route('profile');
        session()->flash('success', 'profile updated');
    }

    public function deletepost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('profile');
    }

    public function render()
    {
        $follower = Addfriend::where('friend_id', Auth::user()->id)->count();
        $follow = Addfriend::where('user_id', Auth::user()->id)->count();
        $user = Auth::user();
        $post = Post::where('user_id', Auth::user()->id);
        $posts = $post->orderBy('created_at', 'DESC')->get();
        return view('livewire.profile', ['follower' => $follower, 'follow' => $follow, 'user' => $user, 'posts' => $posts]);
    }
}
