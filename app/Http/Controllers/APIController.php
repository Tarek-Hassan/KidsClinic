<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class APIController extends Controller
{
    private $url;
    private $client;
    public function __construct()
    {
        $this->url='';
        $this->client=new Client();
        
    }
    //
    public function index(){
        
        $request=$this->client->get($this->url);
        $data=$request->getBody();
        return view('home.api',compact('data'));
    }

    public function store(Request $request){
        $data=$request->all();
        $request=$this->client->post($this->url,['body'=>$data]);
        $response=$request->send();
        dd($response);
        return view('home.api',compact('data'));
    }
    
    public function update(Request $request,$id){
        $this->url=$this->url.'/'.$id;
        $data=$request->all();
        $request=$this->client->put($this->url,['body'=>$data]);
        $response=$request->send();
        dd($response);
        return view('home.api',compact('data'));
    }

    public function destroy($id){
        $this->url=$this->url.'/'.$id;
        $request=$this->client->delete($this->url);
        $response=$request->send();
        dd($response);
        return view('home.api',compact('data'));
    }
}
