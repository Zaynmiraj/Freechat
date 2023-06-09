<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class Chatbot extends Component
{
    use WithFileUploads;
    public $message;
    public $receiver_id;
    public $img;

    public function mount($receiver_id)
    {
        $this->receiver_id = $receiver_id;
    }

    public function sendMessage()
    {
        $message = new Message();
        $message->sender_id = auth()->user()->id;
        $message->receiver_id = $this->receiver_id;
        $message->message = $this->message;
        if ($this->img) {
            $imageName = Carbon::now()->timestamp . '.' . $this->img->extension();
            $this->img->storeAs('user/message', $imageName);
            $message->img = $imageName;
        }
        $message->save();

        $this->message = '';
        $this->emit('messageSent');
    }


    public function render()
    {
        // $friends = Auth::user()->friends();
        // $messages = Message::whereIn('sender_id', $friends->pluck('user_id'))
        //     ->whereIn('receiver_id', $friends->pluck('friend_id'))
        //     ->orderBy('created_at', 'asc')
        //     ->get();

        $user = User::find($this->receiver_id);
        $messages = Message::where(function ($query) {
            $query->where('sender_id', auth()->user()->id)
                ->where('receiver_id', $this->receiver_id);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiver_id)
                ->where('receiver_id', auth()->user()->id);
        })->orderBy('created_at')->get();

        return view('livewire.chatbot', ['messages' => $messages, 'user' => $user]);
    }
}
