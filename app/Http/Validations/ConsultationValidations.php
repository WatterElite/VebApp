<?php


namespace App\Http\Validations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as V;

class ConsultationValidations
{
    public function save(Request $request): V
    {
        return Validator::make($request->all(), [
            'text' => 'required|string|max:255',
        ]);
    }

    public function savePhone(Request $request): V
    {
        return Validator::make($request->all(), [
            'phone' => 'required|string|max:17|min:17',
        ]);
    }
}