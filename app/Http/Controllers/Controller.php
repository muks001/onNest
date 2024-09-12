<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *    title="Odat API",
 *    version="1.0.0",
 * )
 */class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendResponse($data, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    public function sendError($error, $message = [], $code = 422)
    {
    	$response = [
            'success' => false,
            'data' => $message,
            'message' => $error,
        ];

        return response()->json($response, $code);
    }

}
