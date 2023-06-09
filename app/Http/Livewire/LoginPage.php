<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginPage extends Component
{
    public function render()
    {
        return view('livewire.login-page');
    }
}
