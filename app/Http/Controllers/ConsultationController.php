<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Interfaces\ConsultationContract;
use Log;

class ConsultationController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct();
    }

    public function consultation(Request $request, ConsultationContract $consultationContract)
    {
        $consultation = $consultationContract->save($this->user, $request);

        return;
    }

    public function consultationPhone(Request $request, ConsultationContract $consultationContract)
    {
        $consultation = $consultationContract->savePhone($this->user, $request);
        return;
    }
}
