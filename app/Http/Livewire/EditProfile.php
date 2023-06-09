<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Addfriend;
use Illuminate\Support\Facades\Auth;

class EditProfile extends Component
{
    public function render()
    {
        $follower = Addfriend::where('friend_id', Auth::user()->id)->count();
        $follow = Addfriend::where('user_id', Auth::user()->id)->count();
        return view('livewire.edit-profile', ['follower' => $follower, 'follow' => $follow]);
    }
}
