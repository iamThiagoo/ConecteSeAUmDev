<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class InterestScreen extends Component
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
        return view('livewire.components.interest-screen');
    }

    public function skipScreen () : RedirectResponse
    {
        if (empty($this->user->preference)){
            return redirect()->route('preferences');
        }

        return redirect()->route('feed');
    }

    public function save ()
    {
        dd($this->payload);
    }
}
