<?php

namespace App\Http\Services\Interfaces;

interface ApiServisContract 
{
    const ENDPOINT = "https://api.botboom.ru/wapp/", SECRET_KEY = "#";

    public function post($method, $object = null);
}