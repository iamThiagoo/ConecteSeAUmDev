<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use App\Models\Interest;
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
        $this->categories = Category::with('skills:id,category_id,name')
                                    ->select('id', 'name')
                                    ->get()
                                    ->toArray();
    }

    public function render()
    {
        return view('livewire.components.interest-screen');
    }

    public function save () : RedirectResponse
    {
        try
        {
            $this->insertData();

            if (userIsDeveloper())
            {
                return redirect()->route('preferences');
            }

            return redirect()->route('feed');

        } catch (\Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function insertData () : void
    {
        Interest::updateOrCreate([
            'user_id' => auth()->user()->id
        ], [
            'data' => json_encode($this->payload)
        ]);
    }

    public function skipScreen () : RedirectResponse
    {
        if (userIsDeveloper() && empty($this->user->preference)){
            return redirect()->route('preferences');
        }

        return redirect()->route('feed');
    }
}
