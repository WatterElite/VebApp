<?php

namespace App\Http\Services;

use App\Http\Services\Interfaces\BasketContract;
use App\Models\BasketItem;

use App\Http\Services\Validation\Controller as Validation;
use App\Http\Validations\BasketValidations;

class BasketServices extends Validation implements BasketContract{
    public function __construct()
    {
        $this->validation = new BasketValidations();
    }

    function add($user, $product_id)
    {
        $arr["user_id"] = $user->id;
        $arr["product_id"] = $product_id;
        $validData = $this->validation(__FUNCTION__, $arr);

        BasketItem::create($arr);

        // Log::debug($object);
        return;
    }

    function get($user)
    {
        // Log::debug($object);
        return BasketItem::where("user_id", $user->id)->orderBy('id', 'desc')->get();
    }

    function delete($basket_id)
    {
        $validData = $this->validation(__FUNCTION__, $basket_id);
        // Log::debug($object);
        return BasketItem::destroy($basket_id);
    }
}