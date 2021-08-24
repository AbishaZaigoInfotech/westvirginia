<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\API\NotificationService;

class NotificationController extends Controller
{
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function pushNotification(Request $request)
    {
        $notification = $this->notificationService->pushNotification($request);
        if($notification){
            return apiResponse("Notification sent sucessfully", 200, (object)[]);
        }else{
            return apiResponse("Failed to send notification", 400, (object)[]);
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
