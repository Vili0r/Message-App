<div>
    @foreach($chats as $chat)
        <li class="{{ $active==$chat->id ? 'bg-warning' : '' }}">
            <a wire:click="$emit('viewChat', {{ $chat->id }} )" href="#">       
                <div class="contacts-list-info">
                    <span class="contacts-list-name text-dark">
                        @if($chat->sender_id == auth()->id())
                            {{ $chat->receiver->name }}
                        @else
                            {{ $chat->sender->name }}
                        @endif
                        <small class="float-right contacts-list-date text-muted">{{ $chat->messages->last()?->created_at->diffForHumans() }}</small>
                    </span>
                    <span class="contacts-list-msg text-secondary">{{ $chat->messages->last()?->message_text }}</span>
                </div>
            </a>
        </li>
        <hr/>
        <!-- /.contacts-list-info -->    
    @endforeach        
</div>
