<?php

namespace App\Http\Controllers;

use App\Http\BaseResponse\HttpStatusCode;
use App\Http\BaseResponse\ServiceResponse;
use App\Logic\chocie\ChocieLogic;
use App\Models\Chocie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChocieController extends Controller
{
    private $ChocieLogic;

    public function __construct()
    {
        $this->ChocieLogic = new ChocieLogic();
    }

    public function Chocies(): JsonResponse
    {
        $chocies = $this->ChocieLogic->all();
        return ServiceResponse::response_success(HttpStatusCode::OK,'Correcto',$chocies);
    }

    public function CreateChocie(Request $request): JsonResponse
    {
        $validator = Validator::make($request->json()->all(), [
            'id' => 'string|required',
            'chocieName' => 'string|required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->messages()->messages(), 'code' => 400]);
        }
        $chocie = new Chocie();
        $chocie->id = $request->json()->get('id');
        $chocie->chocieName = $request->json()->get('chocieName');
        return $this->ChocieLogic->validateCreate($chocie);
    }
}
