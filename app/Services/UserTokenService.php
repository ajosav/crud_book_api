<?php

namespace App\Services;

use Exception;
use App\Models\User;
use Illuminate\Database\QueryException;

class UserTokenService {

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function createToken($user) {
        $token = $user->createToken($user->first_name)->plainTextToken;
        return array_merge($user->format(), ["_token" => $token]);

    }

    public function newUserAndToken(array $data) {
        try {
            if(!$createUser = $this->user->createUser($data)) {
                return response()->errorResponse("Unable to create user information");
            }
            $user_with_token = $this->createToken($createUser);;

            return response()->success("User Account Successfully created", $user_with_token);
            
        } catch(QueryException $e) {
            return response()->errorResponse($e->getMessage());
        } catch (Exception $e) {
            return response()->errorResponse($e->getMessage());
        }
    }
}