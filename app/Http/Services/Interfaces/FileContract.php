<?php

namespace App\Http\Services\Interfaces;

interface FileContract 
{
    function saveFile($files, $type, $link);
}