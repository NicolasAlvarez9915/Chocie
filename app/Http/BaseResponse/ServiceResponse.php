<?php

namespace App\Http\BaseResponse;

use App\Logic\Shared\Error\ErrorShared;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use phpDocumentor\Reflection\Types\This;

class ServiceResponse
{
	public static function response_success(int $status_code, string $message, $entity = []): JsonResponse
	{
		$response = new Response($status_code, false, $message, $entity);
		return response()->json($response, $response->getStatusCode());
	}

	public static function response_error_validator(Validator $validator, Request $request): JsonResponse
	{
		$messages = $validator->messages()->messages();
		$response =  new Response(HttpStatusCode::UNPROCESSABLE_ENTITY, true, "", $messages);
		ErrorShared::caught_error(HttpStatusCode::UNPROCESSABLE_ENTITY, $messages, $request);
		return response()->json($response, $response->getStatusCode());
	}

	public static function response_error(int $status_code, string $message, Request $request, $entity = []): JsonResponse
	{
		$response =  new Response($status_code, true, $message, $entity);
		ErrorShared::caught_error($status_code, $message, $request);
		return response()->json($response, $response->getStatusCode());
	}

}
