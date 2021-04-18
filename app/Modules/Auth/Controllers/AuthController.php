<?php

namespace App\Modules\Auth\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\ApiBaseController;
use App\Modules\Auth\Requests\AuthLoginRequest;
use App\Modules\Auth\Requests\AuthRegisterRequest;
use App\Modules\Auth\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends ApiBaseController
{
    /**
     * @var AuthService
     */
    private AuthService $service;

    /**
     * AuthController constructor.
     * @param AuthService $service
     */
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function register(AuthRegisterRequest $request): JsonResponse
    {
        $this->service->register($request);
        $credentials = $request->only('email', 'password');

        if ($token = $this->service->login($credentials)) {
            return $this->setResponseHeaders(['Authorization' => $token])
                ->responseWithMessage('User registered');
        }

        return $this->responseWithMessage(
            'Some thing went wrong',
            ResponseHelper::INTERNAL_SERVER_ERROR
        );
    }

    /**
     * @param AuthLoginRequest $request
     * @return JsonResponse
     */
    public function login(AuthLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->service->login($credentials)) {
            return $this->setResponseHeaders(['Authorization' => $token])
                ->responseWithMessage('User logged in');
        }

        return $this->responseWithMessage(
            'Email or password is incorrect',
            ResponseHelper::UNAUTHORIZED
        );
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->service->logout();

        return $this->responseWithMessage('User log outed');
    }

    /**
     * @return JsonResponse
     */
    public function user(): JsonResponse
    {
        $user = $this->service->user();

        return $this->responseWithData(compact('user'));
    }

    /**
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        if ($token = $this->service->refresh()) {
            return $this->setResponseHeaders(['Authorization' => $token])
                ->responseWithMessage('User token refreshed');
        }

        return $this->responseWithMessage(
            'Unauthorized',
            ResponseHelper::RESPONSE_CODE_UNAUTHORIZED
        );
    }
}
