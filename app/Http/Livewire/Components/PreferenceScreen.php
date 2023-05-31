<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class PreferenceScreen extends Component
{
    public $user;
    public $categories;
    public $payload;

    public function mount ()
    {
        $this->user = auth()->user()->load('profile')->toArray();
        $this->categories = Category::with('skills')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.components.preference-screen');
    }

    public function skipScreen () : RedirectResponse
    {
        return redirect()->route('feed');
    }

    public function save ()
    {
        dd($this->payload);
    }
}
