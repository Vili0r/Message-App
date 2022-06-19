<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\Message;
use Livewire\Component;

class ChatMessage extends Component
{
    public $newMessage;
    public $userId;
    public $chatId;
    public $selectedChat;
    public $chats;

    public function mount()
    {
        $this->userId = auth()->id();
        $this->selectedChat = Chat::query()
                    ->where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id())
                    ->first();
        $this->chats = Chat::query()
                    ->where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id())
                    ->get();
    } 

    protected $listeners = ['viewChat'];

    public function viewChat($selectedchatId)
    {
        $this->selectedChat = Chat::findOrFail($selectedchatId);
        $this->chatId = $selectedchatId;
    }

    public function sendMessage()
    {
        Message::create([
            'user_id' => $this->userId,
            'message_text' => $this->newMessage,
            'chat_id' => $this->chatId
        ]);

        $this->reset('newMessage');
    }

    public function render()
    {
        $messages = Message::where('chat_id', $this->chatId)->get();

        return view('livewire.chat-message', compact('messages'));
    }
}
