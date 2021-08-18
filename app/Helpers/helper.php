<?php
    if(!function_exists('apiResponse')){
        function apiResponse($message, $code, $data=[]){
            if ($code == 200) {
                $status = 'success';
            } elseif ($code == 400) {
                $status = 'bad_request';
            } elseif ($code == 401) {
                $status = 'unauthorized';
            } elseif ($code == '403') {
                $status = 'forbidden';
            } elseif ($code == '423') {
                $status = 'locked';
            } elseif ($code == '422') {
                $status = 'failure';
            } else {
                $statusTexts = \Illuminate\Http\Response::$statusTexts;
                if(in_array($code,$statusTexts)) $status = $statusTexts[$code];
                else $status = 'failure';
            }
            $response = [
                'message' => $message,
                'code' => $code,
                'status' => $status,
                'data' => $data,
            ];
            return response()->json($response);
        }
    }
?>