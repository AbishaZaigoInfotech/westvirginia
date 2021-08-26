<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StationRequest;
use App\Models\Station;
use App\Models\Category;
use App\Models\StationCategory;
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
        $formats = StationCategory::all();
        $categories = Category::all();
        $stations = $this->stationService->index($request);
        return view('stations.index', compact('stations', 'categories', 'formats'));
    }

    public function create()
    {
        $format = Category::where('name','categories')->select('id')->first();
        $categories = Category::where('parent_category_id', $format['id'])->get();
        return view('stations.create', compact('categories'));
    }

    public function store(StationRequest $request)
    {
        $stations = $this->stationService->store($request);
        return redirect()->route('stations.index')->withSuccess('Station successfully created.');
    }

    public function show($id)
    {
        $station = $this->stationService->show($id);
        $categories = Category::get();
        $formats = StationCategory::where('station_id', $id)->get();
        return view('stations.show', compact('station', 'formats', 'categories'));
    }

    public function edit($id)
    {
        
        $format = Category::where('name','categories')->select('id')->first();
        $categories = Category::where('parent_category_id', $format['id'])->get();
        $station = Station::where('id', $id)->first();
        $formats = StationCategory::where('station_id', $id)->get();
        return view('stations.edit', compact('station', 'categories', 'formats'));
    }

    public function update(StationRequest $request, $id)
    {
        $stations = $this->stationService->update($request, $id);
        return redirect()->route('stations.index')->withSuccess('Station successfully updated.');;
    }

    public function destroy($id)
    {
        $stations = $this->stationService->destroy($id);
        return redirect()->route('stations.index')->withSuccess('Station successfully deleted.');
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

