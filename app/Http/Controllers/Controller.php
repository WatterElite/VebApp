<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ApiInfoUser;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;

    public function __construct()
    {
        date_default_timezone_set('Europe/Moscow');
        $this->middleware(function ($request, $next) {
            $this->user = null;
            if(Auth::check()){
                $this->user = Auth::user();
                $apiInfoUserTo = ApiInfoUser::where('user_id', $this->user->id)->first();
                $this->user->apiInfoUserTo[0] = $apiInfoUserTo;
           
            }
            
            //dd($this->user->apiInfoUserTo[0]->creationDate);
            
            view()->share('u', $this->user);
            view()->share('addPercente', 1.5);

            return $next($request);
        }); 
    }
}
