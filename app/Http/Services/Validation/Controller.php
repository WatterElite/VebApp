<?php

namespace App\Http\Services\Validation;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function validation($functionName, $request)
    {
        $data = $this->validation->$functionName($request);
        if ($data->fails())
            throw new ValidationException($data);
        
        return $data->validated();
    }

    // public function runValidator($request) {
    //     $currentAction = Route::currentRouteAction();
    //     // Log::debug($currentAction);
    //     list($controller, $method) = explode('@', $currentAction);
    //     return $this->validation->$method($request);
    // }
}
