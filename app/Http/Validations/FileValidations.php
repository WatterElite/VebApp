<?php


namespace App\Http\Validations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as V;
use Log;

class FileValidations
{
    public function saveFile(Request $request): V
    {
        // $request["type"] - |mimes:png
        return Validator::make($request->all(), [
            'img' => 'required',
            'img.*' => 'required|file|max:10000000'.$request["type"],
        ]);
    }
}