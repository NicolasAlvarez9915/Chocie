<?php

namespace App\Http\Controllers;

use App\Http\BaseResponse\HttpStatusCode;
use App\Http\BaseResponse\ServiceResponse;
use App\Models\Chocie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ControllerPrueba extends Controller
{

    public function Chocies(Request $request): JsonResponse
    {
        $chocies = Chocie::all();
        return ServiceResponse::response_success(HttpStatusCode::OK,'Correcto',$chocies);
    }
}
