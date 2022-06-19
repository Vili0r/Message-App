<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StartDirectMessage extends Component
{
    public int $userId;
    public bool $startTexting = false;

    public function mount()
    { 
        $this->startTexting = Auth::user()->receivers->contains($this->userId);    
    }

    public function render()
    {
        return view('livewire.start-direct-message');
    }

    public function text()
    {
        if($this->startTexting){
            Auth::user()->receivers()->detach($this->userId);
        } else{
            Auth::user()->receivers()->attach($this->userId);
        }

        $this->startTexting = !$this->startTexting;
    }
}
