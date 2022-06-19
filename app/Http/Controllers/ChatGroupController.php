<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatGroupRequest;
use App\Http\Requests\UpdateChatGroupRequest;
use App\Models\Chat;
use App\Models\ChatGroup;
use Illuminate\Http\Request;

class ChatGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chatgroups = ChatGroup::where('user_id', auth()->id())->get();

        $chats = Chat::query()
                    ->where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id())
                    ->get();
        
        //$chats->load(['sender', 'receiver', 'messages']);

        return view('chatgroups.index', compact('chatgroups', 'chats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chatgroups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateChatGroupRequest $request)
    {
        ChatGroup::create($request->validated() + [
            'user_id' => auth()->id()
        ]);

        $request->session()->flash('flash.banner', 'Chat group added successfuly');

        return redirect()->route('chatgroups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatGroup $chatgroup)
    {
        if($chatgroup->user_id != auth()->id()){
            abort(403);
        }

        return view('chatgroups.edit', compact('chatgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChatGroupRequest $request, ChatGroup $chatgroup)
    {
        if($chatgroup->user_id != auth()->id()){
            abort(403);
        }

        $chatgroup->update($request->validated());

        $request->session()->flash('flash.banner', 'Chat group updated successfuly');

        return redirect()->route('chatgroups.index', compact('chatgroup'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ChatGroup $chatgroup)
    {
        if($chatgroup->user_id != auth()->id()){
            abort(403);
        }

        $chatgroup->delete();

        $request->session()->flash('flash.banner', 'Chat group deleted successfuly');

        return redirect()->route('chatgroups.index', compact('chatgroup'));
    }
}
