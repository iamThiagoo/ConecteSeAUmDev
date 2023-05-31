<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Category;
use App\Models\Preference;
use Illuminate\Http\RedirectResponse;

class PreferenceScreen extends Component
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
        return view('livewire.components.preference-screen');
    }

    public function save () : RedirectResponse
    {
        try
        {
            $this->insertData();

            return redirect()->route('feed');

        } catch (\Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function insertData () : void
    {
        Preference::updateOrCreate([
            'user_id' => auth()->user()->id
        ], [
            'data' => json_encode($this->payload)
        ]);
    }

    public function skipScreen () : RedirectResponse
    {
        return redirect()->route('feed');
    }
}
