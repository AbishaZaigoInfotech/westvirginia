<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StationRequest;
use App\Models\Station;
use App\Services\API\StationService;
use App\Http\Resources\StationCollection;
use App\Models\Setting;
use Helpers;

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
            $stationDetail['sleep_time'] = Setting::where('name', 'sleep_time')->first()->value;
            $stationDetail['next_links'] = $stations->nextPageUrl();
            $stationDetail['previous_links'] = $stations->previousPageUrl();
            return apiResponse("Stations listed sucessfully", 200, $stationDetail);
    }
}
