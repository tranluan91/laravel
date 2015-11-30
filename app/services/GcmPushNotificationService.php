<?php

class GcmPushNotificationService extends BaseService
{

    /**
     * Push notification to device
     * @param array $gcmIds - GCM ID of users
     * @param array $message - Message send to device
     * @param array $userIds - List User Ids related to Gcm Ids
     */
    public static function push($gcmIds = [], $message = [])
    {
        $fields = [
            'registration_ids'  => $gcmIds,
            'data' => $message,
        ];
        $headers = [
            'Authorization: key=' . Config::get('gcm.api_key'),
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
