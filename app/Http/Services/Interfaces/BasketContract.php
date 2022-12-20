<?php

namespace App\Http\Services\Interfaces;

interface BasketContract 
{
    function add($user, $product_id);
    function get($user);
    function delete($basket_id);
}