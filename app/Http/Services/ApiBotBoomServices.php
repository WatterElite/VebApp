<?php

namespace App\Http\Services;

use App\Http\Services\Interfaces\ApiServisContract;
use Log;

class ApiBotBoomServices implements ApiServisContract{
    function post($method, $object = null)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', self::ENDPOINT.$method.self::SECRET_KEY, [
            // 'headers' => [
            //         'Authorization' => 'Token '.self::SECRET_KEY,
            //         'Content-Type' => 'application/json',
            // ],
            'form_params'  =>  $object
            
        ]);
        $responseJSON = json_decode($response->getBody(), true);

        // Log::debug($object);
        return $responseJSON;
    }
}