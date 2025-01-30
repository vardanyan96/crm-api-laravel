<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'api.Unauthorized'], 401);
        }

        $refreshToken = JWTAuth::fromUser(Auth::user());

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ])->cookie('refresh_token', $refreshToken, 60 * 24 * 7, '/', env('SESSION_DOMAIN'), true, true);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => __('ui.Logged out')])->withoutCookie('refresh_token');
    }

    public function refresh()
    {
        try {
            $refreshToken = request()->cookie('refresh_token');
            if (!$refreshToken) {
                return response()->json(['error' => __('api.Refresh token not found')], 401);
            }

            JWTAuth::setToken($refreshToken);
            $newToken = JWTAuth::refresh();

            return response()->json([
                'access_token' => $newToken,
                'token_type' => 'bearer',
                'expires_in' => JWTAuth::factory()->getTTL() * 60,
            ]);
        } catch (JWTException $e) {
            return response()->json(['error' => __('api.Refresh token invalid')], 401);
        }
    }

    public function me()
    {
        return response()->json(Auth::user());
    }
}
