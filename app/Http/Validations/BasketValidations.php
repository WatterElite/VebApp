<?php


namespace App\Http\Validations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as V;

use Illuminate\Validation\Validator as ValidationValidator;

use Illuminate\Support\Facades\Auth;
use App\Models\BasketItem;
use Log;

class BasketValidations
{
    public function delete($basket_id): V
    {
        $arr["basket_id"] = $basket_id;

        $validator = Validator::make($arr, [
            'basket_id' => 'required|int|exists:App\Models\BasketItem,id',
        ]);

        $validator->after(function (ValidationValidator $validator) use ($basket_id) {
            if (!$validator->errors()->messages()) {
                $user = Auth::user();
                if(!BasketItem::where("id", $basket_id)->where("user_id", $user->id)->count())
                {
                    $validator->errors()->add('basket_id', 'У вас нету доступа!');
                }
                
                // if (isset($request->ba2) && !!$request->ba2 && !$request->user()->can('deals.ba2')) {
                //     $validator->errors()->add('ba2', 'Нет доступа к использованию старой формулы');
                // }
                // $client = Client::whereId($request->client_id)->first();
                // if ($client->no_motiv && $client->id != 10403) {
                //     $validator->errors()->add('client_id', 'Для приёма партий франшиз - используем модуль "Логистика"');
                // }
            }
        });

        return $validator;
    }

    public function add($arr): V
    {
        Log::debug($arr);
        $validator = Validator::make($arr, [
            'product_id' => 'required|string|exists:App\Models\BasketItem,product_id',
            'user_id' => 'required|int|exists:App\Models\BasketItem,user_id',
        ]);

        if(!$validator->fails())
        {
            Log::debug(11111111111);
            $validator->after(function ($validator) {

                    $validator->errors()->add('product_id', 'Вы уже добавили этот продукт!');
                
            });
            
        } else
        {
            $validator = Validator::make($arr, [
                'product_id' => 'required',
                'user_id' => 'required',
            ]);
        }

        

        return $validator;
    }
}