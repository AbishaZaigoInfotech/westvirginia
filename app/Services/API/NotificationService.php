<?php

namespace App\Services\API;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Device;
use App\Models\Category;

class NotificationService
{

    public function pushNotification(Request $request, $id)
    {
        try{
            $apiKey = config('stations.apiKey');
            $message = Category::select('label', 'description')->where('id', $id)->first();
                $title = $message['label']; 
                $content = $message['description'];
                $deviceIds = Device::select('device_id', 'device_token')->get();
                // $device_token = 'cmZtL1KVSlG33cAqh6jB8x:APA91bEMQtdOXopwov29t6zmwFEUpImFdG1mHkBBPfkpAj6ls7GJHQhQV8nNnff1tsvPGmdoPczTVObaY-1xo7crqY5ous8FA92iIBIMhbWq1ECPSKDlCgoxrR_TG09PLSAo0WSk0StJ';
                foreach($deviceIds as $deviceId)
                {
                    $data = [
                        'to' => 
                            $deviceId['device_token'],
                        'notification' => [
                            'title' => $title,
                            'body' => $content,
                        ]
                    ];
                    $dataString = json_encode($data);
                    $headers = [
                        'Content-Type:application/json',
                        'Authorization: key=' . $apiKey,
                    ];
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);          
                    $response = curl_exec($ch);
                    $result = json_decode($response, true);
                    $notification = new Notification;
                    $notification->message_id = $result['results'][0]['message_id'];
                    $notification->message = $content;
                    $notification->title = $title;
                    $notification->device_id = $deviceId['device_id'];
                    $notification->device_token = $deviceId['device_token'];
                    if($result['success']==1){
                        $notification->status = 1;
                    }elseif($result['failure']==1){
                        $notification->status = 0;
                    }
                    
                    $notification->save();
            }
            return $notification;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function index(Request $request)
    {
        try{
            $notifications = Notification::orderBy('id', 'desc')->get();
            return $notifications;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function store(Request $request)
    {
        try{
                $device = Device::where('device_token', $request->device_token)->first();
                if($device)
                {
                    $device = Device::where('device_token', $request->device_token)->first();
                    $device->device_id = $request->device_id;
                    $device->device_token = $request->device_token;
                    $device->save();
                    return $device;
                }else{
                    $device = new Device;
                    $device->device_id = $request->device_id;
                    $device->device_token = $request->device_token;
                    $device->save();
                    return $device;
                }
            
        } catch (\Exception $e) {
            dd($e);
            return false;
        }
    }

}

?>