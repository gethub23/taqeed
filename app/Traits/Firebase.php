<?php

namespace App\Traits;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\UserToken ;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
trait  Firebase
{
    public function sendNotification($user , $data)
    {
        $firebaseToken = UserToken::where('user_id' , $user->id)->pluck('device_id')->all();
        $SERVER_API_KEY = 'AAAAzlx30Fw:APA91bEP_TbN2dLmmMu7SX51bpupssSxPhSYxB4ucm3y8XlviLbw2yC5epxRndwgC7BsfCy_suUiAkYfTXdPeGXxZVcykqbv55pmE0K3RpkFjYhtjVYIAjSC2yaD6KptJ9bLJEFs5CQy';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $data['title_'.$user->lang],
                "body"  => $data['message_'.$user->lang],
                'sound' => true,
            ],
            'data'  => $data
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
    }
}

