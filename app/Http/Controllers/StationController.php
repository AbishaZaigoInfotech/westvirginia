<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StationRequest;
use App\Models\Station;
use App\Models\Category;
use App\Services\StationService;
use DB;
class StationController extends Controller
{
    //
    public function __construct(StationService $stationService)
    {
        $this->stationService = $stationService;
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $stations = $this->stationService->index($request);
        return view('stations.index', compact('stations', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('stations.create', compact('categories'));
    }

    public function store(StationRequest $request)
    {
        $stations = $this->stationService->store($request);
        return redirect()->route('stations.index');
    }

    public function show($id)
    {
        $station = $this->stationService->show($id);
        return view('stations.show', compact('station'));
    }

    public function edit($id)
    {
        
        $categories = Category::all();
        $station = Station::where('id', $id)->first();
        return view('stations.edit', compact('station', 'categories'));
    }

    public function update(StationRequest $request, $id)
    {
        $stations = $this->stationService->update($request, $id);
        return redirect()->route('stations.index');
    }

    public function destroy($id)
    {
        $stations = $this->stationService->destroy($id);
        return redirect()->route('stations.index');
    }

    public function deleteImage($id)
    {
        $station = Station::find($id);
        $path = 'storage/images/';
		if(isset($station->logo) && $station->logo!=='' && $station->logo !== null ) {
			$station->logo=null;
            $station->save();
            return redirect()->back();
		}
    }
}

