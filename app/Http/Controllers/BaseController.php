<?php

namespace App\Http\Controllers;


class BaseController extends Controller
{
    protected function successResponse($data = null, $message = null, $statusCode = 200)
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if (isset($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $statusCode);
    }

    protected function errorResponse($message = null, $statusCode = 400, $errors = null)
    {
        $response = [
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ];

        return response()->json($response, $statusCode);
    }
}
