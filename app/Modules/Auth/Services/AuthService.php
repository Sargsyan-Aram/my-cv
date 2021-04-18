<?php


namespace App\Modules\Auth\Services;


use App\Modules\Auth\Repositories\AuthRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;

class AuthService
{
    /**
     * @var AuthRepository
     */
    private AuthRepository $repository;

    /**
     * AuthService constructor.
     * @param AuthRepository $repository
     */
    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     */
    public function register(Request $request)
    {
        $this->repository->create($request);
    }

    /**
     * @param array $credentials
     * @return null|string
     */
    public function login(array $credentials): ?string
    {
        if ($token = $this->guard()->attempt($credentials)) {
            return $token;
        }

        return null;
    }

    /**
     * @return Authenticatable|null
     */
    public function user(): ?Authenticatable
    {
        return auth()->user();
    }

    public function logout()
    {
        $this->guard()->logout();
    }

    /**
     * @return mixed
     */
    public function refresh(): mixed
    {
        return $this->guard()->refresh();
    }

    /**
     * @return Guard|StatefulGuard
     */
    private function guard(): Guard|StatefulGuard
    {
        return auth()->guard();
    }
}
