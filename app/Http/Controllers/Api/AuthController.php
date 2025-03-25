<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
            "password_confirmation" => "required|same:password"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "validation errors.",
                "data" => $validator->errors()->all()
            ]);
        }

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        $response = [];
        $response["token"] = $user->createToken("DIAY")->plainTextToken;
        $response["name"] = $user->name;
        $response["email"] = $user->email;

        return response()->json([
            "status" => 1,
            "message" => "user registered",
            "data" => $response
        ]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();

            return response()->json([
                "status" => 1,
                "message" => "user logged in",
                "data" => $user
            ]);
        }

        return response()->json([
            "status" => 0,
            "message" => "Authentication failed",
            "data" => null
        ]);
    }
}
