<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StationRequest;
use App\Models\Station;

class StationController extends Controller
{
    //
    public function index(Request $request)
    {
        $stations = Station::select('id', 'logo', 'call_letters', 'frequency', 'format', 'streaming_player', 'website', 'phone', 'email'); 
        if($request->format){
            $stations->where('format', $request->format);
        }
        if($request->call_letters==1){
            $stations->orderBy('call_letters', 'asc');
        }elseif($request->call_letters==2){
            $stations->orderBy('call_letters', 'desc');
        }
        if($request->search) {
            $stations->where('call_letters','like','%'.$request->search.'%')
                     ->orWhere('frequency','like','%'.$request->search.'%')
                     ->orWhere('format','like','%'.$request->search.'%')
                     ->orWhere('phone','like','%'.$request->search.'%')
                     ->orWhere('email','like','%'.$request->search.'%');
        }   
        $stations = $stations->paginate(2);
        return view('stations.index', compact('stations'));
    }

    public function create()
    {
        return view('stations.create');
    }

    public function store(StationRequest $request)
    {
        $station = new Station;
        $station->call_letters = $request->call_letters;
        $station->frequency = $request->frequency;
        $station->format = $request->format;
        $station->streaming_player = $request->streaming_player;
        $station->website = $request->website;
        $station->phone = $request->phone;
        $station->email = $request->email;
        if($request->logo!=NULL) {
            $image_name = 'image_' . time() . '_' . uniqid() . '.' . $request->logo->extension();
            $request->logo->storeAs('/public/images/', $image_name);
            $station->logo = $image_name;
        }
        $station->save();
        return redirect()->route('stations.index');
    }

    public function show($id)
    {
        $station = Station::where('id', $id)->first();
        return view('stations.show', compact('station'));
    }

    public function edit($id)
    {
        $station = Station::where('id', $id)->first();
        return view('stations.edit', compact('station'));
    }

    public function update(StationRequest $request, $id)
    {
        $station = Station::find($id);
        $station->call_letters = $request->call_letters;
        $station->frequency = $request->frequency;
        $station->format = $request->format;
        $station->streaming_player = $request->streaming_player;
        $station->website = $request->website;
        $station->phone = $request->phone;
        $station->email = $request->email;
        if($request->logo!=NULL) {
            $image_name = 'image_' . time() . '_' . uniqid() . '.' . $request->logo->extension();
            $request->logo->storeAs('/public/images/', $image_name);
            $station->logo = $image_name;
        }
        $station->save();
        return redirect()->route('stations.index');
    }
    public function destroy($id)
    {
        $station = Station::find($id);
        $station->delete();
        return redirect()->route('stations.index');
    }
}
