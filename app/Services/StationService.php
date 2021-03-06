<?php

namespace App\Services;

use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Requests\StationRequest;
use App\Models\StationCategory;
use App\Models\Category;
use App\Models\Setting;

class StationService
{
    public function index(Request $request)
    {
        $limit = Setting::where('name', 'entries_per_page')->pluck('value');
        $stations = Station::with('stationCategory');
        if($request->format){
            $format =  $request->format;
            $stations->whereHas('stationCategory', function ($query) use($format) {
                $query->whereIn('category_id', $format);
            });
        }
            
        
        if($request->status!=''){
            $stations->where('status', $request->status);
        }
        if($request->call_letters=='asc'){
            $stations->orderBy('call_letters', 'asc');
        }elseif($request->call_letters=='desc'){
            $stations->orderBy('call_letters', 'desc');
        }
        if($request->search) {
            $stations->where('call_letters','like','%'.$request->search.'%')
                    ->orWhere('name','like','%'.$request->search.'%')
                    ->orWhere('frequency','like','%'.$request->search.'%')
                    ->orWhere('phone','like','%'.$request->search.'%')
                    ->orWhere('email','like','%'.$request->search.'%');
        }
        return $stations->orderBy('id', 'desc')->paginate($limit[0]);        
    }

    public function store(StationRequest $request)
    {
        $station = new Station;
        $station->name = ucfirst($request->name);
        $station->call_letters = strtoupper($request->call_letters);
        $station->frequency = $request->frequency;
        $station->streaming_player = $request->streaming_player;
        $station->website = $request->website;
        $station->facebook = $request->facebook;
        $station->twitter = $request->twitter;
        $station->instagram = $request->instagram;
        $station->phone = $request->phone;
        $station->email = $request->email;
        $station->status = $request->status;
        if($request->logo!=NULL) {
            $image_name = 'image_' . time() . '_' . uniqid() . '.' . $request->logo->extension();
            $request->logo->storeAs('/public/images/', $image_name);
            $station->logo = $image_name;
        }
        $station->save();

        $id = $station->id;
        $stationCategory = new StationCategory;
        if (!empty($request->format)) {
            $count = count($request->format);
            $indexes = array_keys($request->format);
            for ($i = 0; $i < $count; $i++) {
                $index = $indexes[$i];
                $stationCategories[] = [
                    'station_id' => $id,
                    'category_id' => $request->format[$index],
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }
            StationCategory::insert($stationCategories);
        }
        return $station;
    }

    public function show($id)
    {
        $station = Station::with('category')->where('id', $id)->first();
        return $station;
    }

    public function update(StationRequest $request, $id)
    {
        $station = Station::find($id);
        $station->name = ucfirst($request->name);
        $station->call_letters = strtoupper($request->call_letters);
        $station->frequency = $request->frequency;
        $station->streaming_player = $request->streaming_player;
        $station->website = $request->website;
        $station->facebook = $request->facebook;
        $station->twitter = $request->twitter;
        $station->instagram = $request->instagram;
        $station->phone = $request->phone;
        $station->email = $request->email;
        $station->status = $request->status;
        if($request->logo!=NULL) {
            $image_name = 'image_' . time() . '_' . uniqid() . '.' . $request->logo->extension();
            $request->logo->storeAs('/public/images/', $image_name);
            $station->logo = $image_name;
        }
        $station->save();

        $format = StationCategory::where('station_id', $id);
        $format->delete();
        if (!empty($request->format)) {
            $count = count($request->format);
            $indexes = array_keys($request->format);
            for ($i = 0; $i < $count; $i++) {
                $index = $indexes[$i];
                $stationCategories[] = [
                    'station_id' => $id,
                    'category_id' => $request->format[$index],
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }
            StationCategory::insert($stationCategories);
        }
        return $station;
    }
    public function destroy($id)
    {
        $station = Station::find($id);
        $station->delete();
        return $station;
    }
}

?>