<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
    /**
     * addMessage Method to add message 
     */
    public function addMessage(Request $request){
        $request->to=$request->input("to");
        $request->body=$request->input("body");
        $request['from']=Auth::user()->id;
        $chat = Chat::create($request->all());
                // pusher
                $options = array(
                    'cluster' => 'eu',
                    'useTLS' => true
                );
        
                $pusher = new Pusher(
                    env('PUSHER_APP_KEY'),
                    env('PUSHER_APP_SECRET'),
                    env('PUSHER_APP_ID'),
                    $options
                );
        
           
                $pusher->trigger('my-channel', 'my-event', $chat);
        // return (bool)$chat ?"Created SuccessFully":"ErrorInCreateing";
    }

    /**
     * getMessage Method to get message with paient and doctor
     */
    public function getMessage(Request $request){
        $id=Auth::id();
        $rec_id=$request->input("rec_id");
        $name=User::where('id',$rec_id)->pluck('name');
        $avatar=User::where('id',$rec_id)->pluck('avatar');

        $message=Chat::where(
            function($q) use ($id,$rec_id){
                $q->where('from',$id)->where('to',$rec_id);
            })->orWhere(
            function($q) use ($id,$rec_id){
                $q->where('from',$rec_id)->where('to',$id);
            })->get();

        $data=[
            'message' => $message,
            'name' => $name,
            'avatar' => $avatar

        ];

        return $data;
      
        
    }
}
