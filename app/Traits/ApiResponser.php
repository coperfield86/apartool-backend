<?php

namespace App\Traits;

use \Illuminate\Http\JsonResponse;

trait ApiResponser
{
    public function successResponse($data = '', $code = 200): JsonResponse
    {
        return response()->json($data, $code);
    }

    public function errorResponse($message = null, $code = 500): JsonResponse
    {
        return response()->json(['error' => $message, 'code'  => $code], $code);
    }
}
