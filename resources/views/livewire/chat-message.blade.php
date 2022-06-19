<div wire:poll.750ms class="col-md-8">
    
    <div class="card direct-chat direct-chat-primary">
        <div class="card-header">
            <h3 class="card-title">Chat with
                @foreach ($chats as $chat)
                    <span>
                        @if($chat->receiver_id == auth()->id())
                            {{ $selectedChat->receiver->name }}
                        @else
                            {{ $selectedChat->sender->name }}
                        @endif   
                    </span>
                @endforeach
            </h3>
        </div>
        
        <div class="box box-danger direct-chat direct-chat-danger">
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                @if(empty($selectedChat))
                    <div class="direct-chat-msg">
                        <div class="clearfix direct-chat-info">
                            <span class="float-left direct-chat-name">
                                Please add a user to start Chatting
                            </span>
                        </div>
                    </div>
                @else
                    @foreach ($selectedChat->messages as $message)
                        <div class="direct-chat-msg {{ $message->user_id == auth()->id() ? 'right' : '' }}">
                            <div class="clearfix direct-chat-info">
                                <span class="float-left direct-chat-name">{{ $message->user_id == auth()->id() ? 'You' : $message->user->name }}</span>
                                <span class="float-right direct-chat-timestamp"">{{ $message->created_at->diffForHumans() }}</span>
                            </div>
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{ $message->message_text }}
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                    @endforeach
               @endif
                <!-- /.direct-chat-msg -->
              </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <form wire:submit.prevent="sendMessage">
                <div class="input-group">
                    <input wire:model.defer="newMessage" type="text" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                </div>
            </form>
        </div>
        <!-- /.card-footer-->
    </div>
</div>