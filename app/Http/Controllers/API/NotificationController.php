<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\API\NotificationService;
use App\Http\Resources\NotificationCollection;

class NotificationController extends Controller
{
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function pushNotification(Request $request, $message)
    {
        $notification = $this->notificationService->pushNotification($request, $message);
        if($notification){
            return true;
        }else{
            return false;
        }
    }

    public function index(Request $request)
    {
        $notifications = $this->notificationService->index($request);
        if($notifications){
            $notificationDetail = NotificationCollection::collection($notifications);
            return apiResponse("Notifications listed sucessfully", 200, $notificationDetail);
        }else{
            return apiResponse("Notifications is not listed", 400, (object)[]);
        }
    }

    public function store(Request $request)
    {
        $notification = $this->notificationService->store($request);
        if($notification){
            return apiResponse("Device details saved successfully", 200, (object)[]);
        }else{
            return apiResponse("Failed to save device details", 400, (object)[]);
        }
    }

}
