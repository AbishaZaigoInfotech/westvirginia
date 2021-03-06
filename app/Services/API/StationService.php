<?php

namespace App\Services\API;

use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Requests\StationRequest;

class StationService
{
    public function index(Request $request)
    {
        try{
            $limit = request('limit') ? request('limit') : config('stations.pageLimit');
            $stations = Station::with('stationCategory');
            if($request->format){
                $format = $request->format;
                $filter = explode(',', $format);
                $stations->whereHas('stationCategory', function ($query)use($filter) {
                    $query->whereIn('category_id', $filter);
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
            return $stations->cursorPaginate($limit);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function show($id)
    {
        try{
            $station = Station::with('category')->where('id', $id)->first();
            return $station;
        } catch (\Exception $e) {
            return false;
        }
    }
}

?>