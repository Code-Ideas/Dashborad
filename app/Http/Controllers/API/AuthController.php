<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *      path="/register",
     *      operationId="register_new_user",
     *      tags={"Sign"},
     *      summary="Register",
     *      description="Register New User",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"name","email","password","password_confirmation"},
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="User Name"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      description="User Email"
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="string",
     *                      format="password",
     *                      description="User Password"
     *                  ),
     *                  @OA\Property(
     *                      property="password_confirmation",
     *                      type="string",
     *                      format="password",
     *                      description="User Password Confirmation"
     *                  ),
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found"
     *      ),
     *     )
     * @param RegisterRequest $request
     * @return UserResource
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->except('password') + ['password' => bcrypt($request->password)]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return (new UserResource($user))->additional([
            'meta' => [
                'token' => (string)$token
            ],
        ]);
    }

    /**
     * @OA\Post(
     *      path="/login",
     *      operationId="login_user",
     *      tags={"Sign"},
     *      summary="Login",
     *      description="Login User",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"email","password"},
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      description="User Email"
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="string",
     *                      format="password",
     *                      description="User Password"
     *                  ),
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found"
     *      ),
     *     )
     * @param LoginRequest $request
     * @return UserResource|\Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $user = auth()->attempt($request->only(['email', 'password']));
        if ($user) {
            $token = auth()->user()->createToken('myapptoken')->plainTextToken;
            return (new UserResource(auth()->user()))->additional([
                'meta' => [
                    'token' => (string)$token
                ],
            ]);
        } else {
            return response()->json(['errors' => [
                'message' => ['No User With Inserted Data']
            ]], 422);
        }
    }

    /**
     * @OA\Post(
     *      path="/logout",
     *      operationId="logout_user",
     *      tags={"Sign"},
     *      summary="Loogout",
     *      description="Loogout User",
     *      security={{"Bearer":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found"
     *      ),
     *     )
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out'], 200);
    }
}
