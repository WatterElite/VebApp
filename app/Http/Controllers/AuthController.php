<?php

namespace App\Http\Controllers;

use App\Http\Services\Interfaces\AuthContract;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(AuthContract $authContract, Request $r)
    {
        return $authContract->login($r);
    }

    // public function getReferrals(AuthContract $authContract)
    // {
    //     return $authContract->getReferrals($this->user);
    // }
}
