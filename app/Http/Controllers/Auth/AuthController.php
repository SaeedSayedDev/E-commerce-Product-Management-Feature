<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
       

        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $request->user()->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
