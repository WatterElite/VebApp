<?php

namespace App\Http\Services;


use App\Http\Services\Interfaces\ConsultationContract;
use App\Http\Services\Interfaces\ApiServisContract;
use App\Http\Controllers\Controller;
use App\Http\Services\Interfaces\FileContract;

use App\Http\Services\Validation\Controller as Validation;
use App\Http\Validations\ConsultationValidations;

use App\Models\Consultation;
use App\Models\ConsultationPhone;

class ConsultationServices extends Validation implements ConsultationContract
{
    private $apiServis, $fileContract;

    public function __construct(ApiServisContract $apiServis, FileContract $fileContract)
    {
        $this->apiServis = $apiServis;
        $this->fileContract = $fileContract;

        $this->validation = new ConsultationValidations();
    }

    public function save($user, $request)
    {
        $validData = $this->validation(__FUNCTION__, $request);

        if($request->hasFile("img")){
            $fileName = $this->fileContract->saveFile($request, "", "/temple/img/consultation");
        }

        Consultation::create([
            'user_id' => $user->id,
            'link_img' => (isset($fileName) ? $fileName : null),
            'text' => $request->text,
        ]);

        $this->apiServis->post("message/send/", ["chatId" => $user->tg_id, "caption" => "Спасибо! Менеджер свяжется с Вами в ближайшее время!"]);

        return;
    }

    public function savePhone($user, $request)
    {
        $validData = $this->validation(__FUNCTION__, $request);

        $this->apiServis->post("message/send/", ["chatId" => $user->tg_id, "caption" => "Спасибо! Менеджер свяжется с Вами в ближайшее время!"]);

        ConsultationPhone::create([
            'user_id' => $user->id,
            'phone' => $request->phone,
        ]);
        
        return;
    }
}
