<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfilResource;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MultiAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            // 'role' => 'required|in:owner,worker', // batasi hanya role yang valid
        ]);

        $user = Account::where('email', $request->email)->first();

        if (!in_array($user->role, Account::VALID_ROLES)) {
            return response()->json(['message' => 'Unauthorized role'], 403);
        }


        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        if ($request->input('use_token')) {
            // Bearer token login
            $token = $user->createToken("{$user->role}_auth_token")->plainTextToken;

            return response()->json([
                'user' => $user,
                'role' => $user->role,
                'token' => $token,
                'message' => 'Login with token'
            ]);
        } else {
            // Session-based login
            Auth::guard('web')->login($user);
            return response()->json([
                'user' => $user,
                'role' => $user->role,
                'message' => 'Login with session'
            ]);
        }

    }

    public function logout(Request $request)
    {
        if ($request->bearerToken()) {
            // Token-based
            $request->user()?->currentAccessToken()?->delete();
        } else {
            // Session-based
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return response()->json(['message' => 'Logged out']);
    }


    public function me(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $user->load('profil.cooperatives');

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'profil' => new ProfilResource($user->profil),
        ]);
    }
}
