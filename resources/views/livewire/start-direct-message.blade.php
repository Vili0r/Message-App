<div>
    @empty($startTexting)
        <a wire:click.prevent="text" href="#">
            <x-tabler-message-circle class="direct-chat-img"/>
        </a>
    @else
        <a wire:click.prevent="text" href="#">
            <x-bx-message-rounded-x class="direct-chat-img"/>
        </a>
    @endempty  
</div>
