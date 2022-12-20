<?php

namespace App\Http\Services;


use App\Http\Services\Interfaces\FileContract;
use Log;
use App\Http\Validations\FileValidations;
use App\Http\Services\Validation\Controller as Validation;
use Illuminate\Support\Facades\File;

class FileServices extends Validation implements FileContract{

    public function __construct()
    {
        //Log::debug(get_class());
        $this->validation = new FileValidations();
    }

    public function saveFile($files, $type, $link)
    {
        $files["type"] = $type;
        $validData = $this->validation(__FUNCTION__, $files);

        $name = time();
        $file = $files->file('img')[0];
        $type = $file->getClientOriginalExtension();

        $file->move(public_path().$link, $name.".".$type);

        return $link."/".$name.".".$type;
    }
}