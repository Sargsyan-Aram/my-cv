<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;

class ApiBaseController extends Controller
{
    private array $headers;

    /**
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function responseWithMessage(string $message, int $code = ResponseHelper::RESPONSE_CODE_SUCCESS): JsonResponse
    {
        if (!empty($this->headers)) {
            return response()->json([
                'message' => $message
            ], $code)->withHeaders($this->headers);
        }

        return response()->json([
            'message' => $message
        ], $code);
    }

    /**
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    public function responseWithData(array $data, int $code = ResponseHelper::RESPONSE_CODE_SUCCESS): JsonResponse
    {
        if (!empty($this->headers)) {
            return response()->json($data, $code)->withHeaders($this->headers);
        }

        return response()->json($data, $code);
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function setResponseHeaders(array $headers): static
    {
        $this->headers = $headers;

        return $this;
    }
}
