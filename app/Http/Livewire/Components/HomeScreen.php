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
        return redirect()->route('auth.google');
    }

    public function render()
    {
        return view('livewire.components.home-screen');
    }
}
