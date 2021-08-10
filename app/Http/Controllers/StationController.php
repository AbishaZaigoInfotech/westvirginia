<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;

class StationController extends Controller
{
    //
    public function index()
    {
        $stations = Station::get(); 
        return view('stations.index', compact('stations'));
    }

    public function create()
    {
        return view('stations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'call_letters'=>'required',
            'frequency'=>'required',
            'format'=>'required',
            'streaming_player'=>'required | url',
            'website'=>'required | url',
            'phone'=>'required | numeric',
            'email'=>'required | regex:/^[a-zA-Z0-9]+@[a-zA-Z]/u | unique:stations',
            // 'logo'=>'required',
        ]);
        $station = new Station;
        $station->call_letters = $request->call_letters;
        $station->frequency = $request->frequency;
        $station->format = $request->format;
        $station->streaming_player = $request->streaming_player;
        $station->website = $request->website;
        $station->phone = $request->phone;
        $station->email = $request->email;
        $station->save();
    }

    public function edit($id)
    {
        $station = Station::where('id', $id)->first();
        return view('stations.edit', compact('station'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'call_letters'=>'required',
            'frequency'=>'required',
            'format'=>'required',
            'streaming_player'=>'required | url',
            'website'=>'required | url',
            'phone'=>'required | numeric',
            'email'=>'required | regex:/^[a-zA-Z0-9]+@[a-zA-Z]/u',
            // 'logo'=>'required',
        ]);   
        $station = Station::where('id', $id)->update([
            'call_letters'=>$request->input('call_letters'),
            'frequency'=>$request->input('frequency'),
            'format'=>$request->input('format'),
            'streaming_player'=>$request->input('streaming_player'),
            'website'=>$request->input('website'),
            'phone'=>$request->input('phone'),
            'email'=>$request->input('email'),
        ]);
        return redirect('stations.index');
    }
}
