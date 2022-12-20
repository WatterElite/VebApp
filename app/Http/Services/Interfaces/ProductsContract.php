<?php

namespace App\Http\Services\Interfaces;

interface ProductsContract 
{
    public function get();
    public function getCatalogs();
    public function getListBuy($user);
}