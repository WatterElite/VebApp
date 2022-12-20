<?php

namespace App\Http\Services\Interfaces;

interface ConsultationContract 
{
    function save($user, $request);
    function savePhone($user, $request);
}