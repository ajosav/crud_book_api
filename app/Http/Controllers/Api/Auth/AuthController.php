<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\UserCreateRequest;
use App\Services\UserTokenService;

class AuthController extends Controller
{
    public $user;

    public function __construct(UserTokenService $user)
    {
        $this->user = $user;
    }

    public function store(UserCreateRequest $request) {
        return $this->user->newUserAndToken($request->validated());
    }

    public function login(LoginRequest $request) {
        $request->authenticate();
        $user_with_token = $this->user->createToken($request->user());
        return response()->success("User Successfully Authenticated", $user_with_token);
    }
}
