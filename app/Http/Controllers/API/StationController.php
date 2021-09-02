<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StationRequest;
use App\Models\Station;
use App\Services\API\StationService;
use App\Http\Resources\StationCollection;
use App\Models\Setting;
use App\Models\Promo;
use App\Models\Notification;
use App\Http\Resources\PromoCollection;
use App\Services\API\PromoService;
use Helpers;

class StationController extends Controller
{
    public function __construct(StationService $stationService, PromoService $promoService)
    {
        $this->stationService = $stationService;
        $this->promoService = $promoService;
    }

    public function index(Request $request)
    {
        
            $stations = $this->stationService->index($request);
            $promos = $this->promoService->index($request);
            if($stations){
                $setting = Setting::where('name', 'sleep_time')->first()->value;
                $notification = Notification::where('status', 1)->get();
                $notificationCount = count($notification);
                $stationDetail['stations'] = StationCollection::collection($stations);
                $stationDetail['promos'] = PromoCollection::collection($promos);
                $stationDetail['sleep_time'] = $setting ? $setting : '';
                $stationDetail['notification_count'] = $notificationCount ? (string)$notificationCount : '';
                $stationDetail['next_links'] = (string)$stations->nextPageUrl();
                $stationDetail['previous_links'] = (string)$stations->previousPageUrl();
                return apiResponse("Stations listed sucessfully", 200, $stationDetail);
            }else{
                return apiResponse("Stations are not listed", 400, (object)[]);
            }
    }

    public function show($id)
    {
        $station = $this->stationService->show($id);
        if($station){
            $stationDetail = new StationCollection($station);
            return apiResponse("Station details listed sucessfully", 200, $stationDetail);
        }else{
            return apiResponse("Station details are not listed", 400, (object)[]);
        }
    }

}
