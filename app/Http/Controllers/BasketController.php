<?php

namespace App\Http\Controllers;

use App\Http\Services\Interfaces\BasketContract;
use Illuminate\Http\Request;
use Log;

class BasketController extends Controller
{
    public function add(BasketContract $basketContract, Request $r)
    {
        return $basketContract->add($this->user, $r->product_id);
    }

    public function delete($basket_id, BasketContract $basketContract)
    {
        Log::debug($basket_id);
        
        return $basketContract->delete($basket_id);
    }
}
