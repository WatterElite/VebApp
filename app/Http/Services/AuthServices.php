<?php

namespace App\Http\Services;


use App\Http\Services\Interfaces\AuthContract;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ApiInfoUser;
use App\Http\Services\Interfaces\ApiServisContract;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AuthServices implements AuthContract{
    private $apiServis;

    public function __construct(ApiServisContract $apiServis) {
        $this->apiServis = $apiServis;
    }

    public function login($r)
    {
        $r_ = $r->all();
        $r_['tg_id'] = $r_['id'];
        unset($r_['id']);

        $user = User::where("tg_id", $r->id)->first();
        if(!$user)
        {
            $apiInfoBot = $this->apiServis->post("user/get/", ["chatId" => $r_['tg_id']]);
            $r_['userProfilePhoto'] = $apiInfoBot['user']['userProfilePhoto'];
            // Log::debug($apiInfoBot);

            $user = User::create($r_);

            $apiInfoUserArr = [
                'user_id' => $user->id,
                'api_id' => $apiInfoBot['user']['_id'],
                'creationDate' => Carbon::parse($apiInfoBot['user']['creationDate']),
                'refferer' => $apiInfoBot['referrer']['first_name']." ".$apiInfoBot['referrer']['last_name'],
                'referralCode' => $apiInfoBot['user']['referralCode'],
                'ammout' => $apiInfoBot['user']['loyalty']['bonusValue'],
            ];

            
            ApiInfoUser::create($apiInfoUserArr);
        }

        Auth::login($user, true);
        return;
    }

    public function getReferrals($user)
    {
        return $this->apiServis->post("user/referrals/", ["chatId" => $user->tg_id]);
    }
}