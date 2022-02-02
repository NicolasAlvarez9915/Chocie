<?php


namespace App\Logic\chocie;


use App\Http\BaseResponse\HttpStatusCode;
use App\Http\BaseResponse\ServiceResponse;
use App\Models\Chocie;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ChocieLogic
{
    private $chocie;

    public function __construct()
    {
        $this->chocie = Chocie::first();
    }

    public function all()
    {
        $chocieI = Chocie::all();
        foreach ($chocieI as $a)
        {
            $a->politicParty = $a->politicParty()->get();
        }
        return $chocieI;
    }

    public function create(Chocie $chocie): JsonResponse
    {
        DB::beginTransaction();
        $chocieBD = Chocie::create([
            'chocieName' => $chocie->chocieName,
            'distributorFigure' => $chocie->distributorFigure,
            'seats' => $chocie->seats,
            'numberVotesWrite' => $chocie->numberVotesWrite,
            'numberVotes' => $chocie->numberVotes
        ]);
        if($chocieBD->save()){
            DB::commit();
            return ServiceResponse::response_success(HttpStatusCode::OK, 'Chocie create successfully', $chocieBD);
        }
        DB::rollBack();
        return ServiceResponse::response_error(HttpStatusCode::INTERNAL_SERVER_ERROR,'Chocie error in created',null,$chocie);
    }

    public function validateCreate(Chocie $chocie): JsonResponse
    {
        $chocieConsult = Chocie::where('id', $chocie->id)->first();
        if($chocieConsult != null)
        {
            return ServiceResponse::response_error(HttpStatusCode::INTERNAL_SERVER_ERROR,'Chocie Existente',null,$chocie);
        }

        return $this->create($chocie);
    }
}
