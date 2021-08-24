<?php
    return [
        
            "pageLimit" => 24,
            'uploads' => [
                'user' => [
                    'path' => 'public/upload/user/profile',
                    'default_avatar' => 'default.jpg' //default user avatar if no profile picture is uploaded
                ],
                'site_settings' => [
                    'path' => 'public/upload/site_settings',
                ]
            ],
            'apiKey' => 'AAAAdyrzUPU:APA91bH_03R55J34L8Qs-UtUD7VPzZJx363a302hm07sYRbZW6sFdpMIebmpY1np4BlLUpUEoMPUPnlGVwJMGSQYiXNIRnvflt8zRceTWIqPAy6-RyTQ9TIao0-JTKngcgy8CmKEQeBL',
            'settings' => [
                'date_format' => [
                    'd/m/Y',
                    'd.m.Y',
                    'd-m-Y',
                    'M d, Y',
                    'dS M, Y',
                    'l M d, Y',
                    'l dS M, Y',
                ],
                'date_time_format' => [
                    'd/m/Y  h:i A',
                    'd.m.Y  h:i A',
                    'd-m-Y  h:i A',
                    'M d, Y  h:i A',
                    'dS M, Y  h:i A',
                    'l M d, Y h:i A',
                    'l dS M, Y h:i A',
                ],
                'time_format' => [
                    'h:i:s A',
                    'h:i A',
                    'H:i:s',
                    'H:i',
                ]
            ],
              /* Add the list of setting 'name' */
            'site_settings' => [
                'site_name',
                'site_logo',
                'admin_email',
                'date_format',
                'date_time_format',
                'time_format',
                'entries_per_page',
                'default_user_role',
                // 'sleep_time'
            ],
            //add the setting 'name' which are related to attachements(image, video,...)
            'site_settings_attachemnt' => [
                'site_logo',
            ],
    ];
?>