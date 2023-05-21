<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class HomeScreen extends Component
{
    public function loginWithGithub ()
    {
        return redirect()->route('auth.github');
    }

    public function loginWithGoogle ()
    {

    }

    public function render()
    {
        return view('livewire.components.home-screen');
    }
}
