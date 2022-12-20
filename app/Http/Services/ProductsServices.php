<?php

namespace App\Http\Services;


use App\Http\Services\Interfaces\ProductsContract;
use App\Http\Services\Interfaces\ApiServisContract;
use App\Http\Controllers\Controller;

class ProductsServices implements ProductsContract
{
    private $apiServis;

    public function __construct(ApiServisContract $apiServis)
    {
        $this->apiServis = $apiServis;
    }

    public function get()
    {
        return $this->apiServis->post("catalog/get/")["goods"];
    }

    public function getCatalogs()
    {
        return $this->apiServis->post("catalog/get/")["category"];
    }

    public function getListBuy($user)
    {
        return $this->apiServis->post("purchase/get/", ["chatId" => $user->tg_id]);
    }
}
