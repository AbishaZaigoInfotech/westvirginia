<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StationRequest;
use App\Models\Station;

class StationController extends Controller
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
    public function store(StationRequest $request)
    {
        //
        try {
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
            return response()->json(['message' => 'Station created successfully', 'status' => 200, 'data' => (object)[]]);
        } catch (\Exception $e) {
			return response()->json(['message' => 'Station not created', 'status' => 400, 'data' => (object)[]]);
		}
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StationRequest $request, $id)
    {
        //
        try {
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
            return response()->json(['message' => 'Station updated successfully', 'status' => 200, 'data' => (object)[]]);
        } catch (\Exception $e) {
			return response()->json(['message' => 'Station not updated', 'status' => 400, 'data' => (object)[]]);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
