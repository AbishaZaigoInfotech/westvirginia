<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StationRequest;
use App\Models\Station;
use App\Services\StationService;
use App\Http\Resources\StationCollection;

class StationController extends Controller
{
    public function __construct(StationService $stationService)
    {
        $this->stationService = $stationService;
    }

    public function index(Request $request)
    {
        $stations = $this->stationService->index($request);
        $stationDetail['stations'] = StationCollection::collection($stations);
        return $stationDetail;
    }
    // public function index(Request $request)
    // {
    //    //
    //     try {
    //         $stations = Station::select('id', 'logo', 'call_letters', 'frequency', 'format', 'streaming_player', 'website', 'phone', 'email'); 
    //         if($request->format){
    //             $stations->where('format', $request->format);
    //         }
    //         if($request->call_letters==1){
    //             $stations->orderBy('call_letters', 'asc');
    //         }elseif($request->call_letters==2){
    //             $stations->orderBy('call_letters', 'desc');
    //         }
    //         if($request->search) {
    //             $stations->where('call_letters','like','%'.$request->search.'%')
    //                         ->orWhere('frequency','like','%'.$request->search.'%')
    //                         ->orWhere('format','like','%'.$request->search.'%')
    //                         ->orWhere('phone','like','%'.$request->search.'%')
    //                         ->orWhere('email','like','%'.$request->search.'%');
    //         }  
    //         $stations = $stations->cursorPaginate(2);
    //         return response()->json(['message' => 'Stations listed successfully', 'status' => 200, 'data' => $stations]);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Stations are not listed', 'status' => 400, 'data' => (object)[]]);
    //     }
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StationRequest $request)
    // {
    //     //
    //     try {
    //         $station = new Station;
    //         $station->call_letters = $request->call_letters;
    //         $station->frequency = $request->frequency;
    //         $station->format = $request->format;
    //         $station->streaming_player = $request->streaming_player;
    //         $station->website = $request->website;
    //         $station->phone = $request->phone;
    //         $station->email = $request->email;
    //         if($request->logo!=NULL) {
    //             $image_name = 'image_' . time() . '_' . uniqid() . '.' . $request->logo->extension();
    //             $request->logo->storeAs('/public/images/', $image_name);
    //             $station->logo = $image_name;
    //         }
    //         $station->save();
    //         return response()->json(['message' => 'Station created successfully', 'status' => 200, 'data' => (object)[]]);
    //     } catch (\Exception $e) {
	// 		return response()->json(['message' => 'Station not created', 'status' => 400, 'data' => (object)[]]);
	// 	}
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    //     try {
    //         $station = Station::where('id', $id)->first();
    //         if($station == null){
    //             return response()->json(['message' => 'No data found', 'status' => 200, 'data' => (object)[]]);
    //         }
    //         return response()->json(['message' => 'Station details listed successfully', 'status' => 200, 'data' => $station]);
    //     } catch (\Exception $e) {
	// 		return response()->json(['message' => 'Station details not listed', 'status' => 400, 'data' => (object)[]]);
	// 	}
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(StationRequest $request, $id)
    // {
    //     //
    //     try {
    //         $station = Station::find($id);
    //         $station->call_letters = $request->call_letters;
    //         $station->frequency = $request->frequency;
    //         $station->format = $request->format;
    //         $station->streaming_player = $request->streaming_player;
    //         $station->website = $request->website;
    //         $station->phone = $request->phone;
    //         $station->email = $request->email;
    //         if($request->logo!=NULL) {
    //             $image_name = 'image_' . time() . '_' . uniqid() . '.' . $request->logo->extension();
    //             $request->logo->storeAs('/public/images/', $image_name);
    //             $station->logo = $image_name;
    //         }
    //         $station->save();
    //         return response()->json(['message' => 'Station updated successfully', 'status' => 200, 'data' => (object)[]]);
    //     } catch (\Exception $e) {
	// 		return response()->json(['message' => 'Station not updated', 'status' => 400, 'data' => (object)[]]);
	// 	}
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
