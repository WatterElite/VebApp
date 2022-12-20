<?php

namespace App\Http\Services\Interfaces;

interface AuthContract 
{
    function login($r);
    function getReferrals($user);
}