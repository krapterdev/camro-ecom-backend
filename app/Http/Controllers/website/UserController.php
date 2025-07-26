<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Email;
use Laravel\Sanctum\PersonalAccessToken;
use function Laravel\Prompts\password;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_name' => 'nullable|string',
            'phone' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'country' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'street_address' => 'required|string',
            'order_notes' => 'nullable|string',
            'password' => 'required|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip_code = $request->zip_code;
        $user->street_address = $request->street_address;
        $user->password = Hash::make($request->password);
        $user->show_password = $request->password;
        $user->role = 'customer';
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'Registration successful. Please check your email to verify your account.'
        ]);
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('login_token')->plainTextToken;

        return response()->json([
            'status' => 200,
            'message' => 'Login successful',
            'user' => [
                'email' => $user->email,
                'role' => $user->role
            ],
            'token' => $token
        ]);
    }

    public function userProfile(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'status' => 200,
            'user' => $user
        ]);
    }


    public function userCheck(Request $request)
    {
        $token = $request->token;
        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken) {
            return response()->json(['user' => null], 401);
        }

        $user = $accessToken->tokenable;

        return response()->json(['user' => $user]);
    }

    public function logout(Request $request)
    {
        $token = $request->token;
        $accessToken = PersonalAccessToken::findToken($token);

        if ($accessToken) {
            $accessToken->delete();
        }

        return response()->json(['message' => 'Logged out']);
    }
}
