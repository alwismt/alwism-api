<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login
     *
     * @OA\Post (
     *  path="/api/login",
     *  tags={"Non Auth"},
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(
     *                  type="object",
     *                  @OA\Property(
     *                      property="email",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="string"
     *                  )
     *              ),
     *              example={
     *                  "email":"example@gmail.com",
     *                  "password":"your-secret",
     *               }
     *           )
     *      )
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="success"
     *  ),
     *  @OA\Response(
     *      response=422,
     *      description="error"
     *  )
     * )
     *
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user->createToken($request->email)->plainTextToken;
    }

    /**
     * Logout User
     * @OA\Post (
     *  path="/api/admin/logout",
     *  tags={"users"},
     *  security={{ "apiAuth": {} }},
     *  @OA\Response(
     *      response=200,
     *      description="succes: client's action was received, understood, accepted and responded."
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="unauthorized: Server requires the client to authorize, use login and token"
     *  )
     * )
     *
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response(['message' => 'You have been successfully logged out.'], 200);
    }

    /**
     * Logged User
     * @OA\Get (
     *  path="/api/admin/user",
     *  tags={"users"},
     *  security={{ "apiAuth": {} }},
     *  @OA\Response(
     *      response=200,
     *      description="succes: client's action was received, understood, accepted and responded."
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="unauthorized: Server requires the client to authorize, use login and token"
     *  )
     * )
     *
     */
    public function user(Request $request)
    {
        return $request->user();
    }
}
