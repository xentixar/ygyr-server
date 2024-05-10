<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()]
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => false], 422);
        }

        $credentials = $validator->validated();

        User::query()->create($credentials);

        return response()->json(['message' => 'User registered successfully', 'status' => true], 200);
    }

    /**
     * @throws ValidationException
     */
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => false], 422);
        }

        $credentials = $validator->validated();

        if (!Auth::attempt($credentials, true)) {
            return response()->json(['errors' => 'Email or password field is incorrect', 'status' => false], 401);
        }

        $user = User::query()->where('email', $request->email)->first();

        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            'data' => [
                'user' => $user,
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ]
        ], 200);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully',
        ], 200);
    }

    public function user(Request $request): JsonResponse
    {
        $user = Auth::user();

        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'Logged in user',
        ], 200);
    }
}
