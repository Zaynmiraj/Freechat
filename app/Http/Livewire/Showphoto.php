<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Message;

class Showphoto extends Component
{

    public $photo_id;

    public function mount($photo_id)
    {
        $this->photo_id = $photo_id;
    }

    public function render()
    {
        $post = Post::find($this->photo_id);
        $message = Message::find($this->photo_id);

        return view('livewire.showphoto', ['message' => $message, 'post' => $post]);
    }
}
