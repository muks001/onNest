<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
      /**
     * @OA\Post(
     * path="/api/login",
     * summary="Sign in",
     * description="Login by email, password",
     * operationId="authLogin",
     * tags={"Guest"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="user@domain.com"),
     *       @OA\Property(property="password", type="password", format="text", example="password"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Email field is required")
     *        )
     *     )
     * )
     */
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email|max:150',
            'password' => 'required|max:50',
        ]);
        if (auth()->attempt($request->only('email', 'password') )) {
            if(!is_null(auth()->user()->deleted_at)){
            $this->logout();
            return $this->sendError('warning',"Your account is deleted.");
            }

            $user = auth()->user();
            $data['user'] = new UserResource($user);
            $data['token'] = $user->createToken('login')->plainTextToken;
            return $this->sendResponse($data, 'Login Successfully');
        }
        return $this->sendError('Invalid Credentials, Please try again', []);
    }
}
