<?php

namespace App\Http\Livewire;

use App\Models\Chat as ModelsChat;
use Livewire\Component;

class Chat extends Component
{
    public $chats;
    public $active;

    public function mount()
    {
        $this->chats = ModelsChat::query()
                    ->where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id())
                    ->get();
    }
    protected $listeners = ['viewChat'];

    public function viewChat($chatId)
    {
        $this->active = $chatId;
    }
    
    public function render()
    {
        return view('livewire.chat');
    }
}
