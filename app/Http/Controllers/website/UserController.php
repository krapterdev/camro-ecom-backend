<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'first_name'      => 'required|string',
            'last_name'       => 'required|string',
            'phone'           => 'required|string|unique:users',
            'email'           => 'required|email|unique:users',
            'country'         => 'required|string',
            'city'            => 'required|string',
            'state'           => 'required|string',
            'zip_code'        => 'required|string',
            'street_address'  => 'required|string',
            'password'        => 'required|string|min:6',
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

        $encryptedId = Crypt::encryptString($user->id);

        $permanentLink = URL::signedRoute(
            'user.verify.email',
            ['id' => $encryptedId]
        );


        // Laravel (backend)
        $parsed = parse_url($permanentLink);
        parse_str($parsed['query'], $queryParams);

        $verificationQuery = http_build_query($queryParams); // id, signature, expires
        $verificationLink = "http://localhost:5173/user-verify/verify?{$verificationQuery}";



        $emailData = [
            'template' => $request->template,
            'name' => $user->first_name . ' ' . $user->last_name,
            'email' => $user->email,
            'verification_link' => $verificationLink
        ];

        try {
            // ✅ Send mail directly
            Mail::to($user->email)->send(new SendMails(
                $emailData,
                'Verify Your Email',
                'emails.user.email_verification'
            ));
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 500,
                'message' => 'User created but failed to send verification email',
                'error'   => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'status'  => 200,
            'message' => 'Registration successful. Please check your email to verify your account.',
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status'  => 401,
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user  = Auth::user();
        $token = $user->createToken('login_token')->plainTextToken;

        return response()->json([
            'status'  => 200,
            'message' => 'Login successful',
            'user'    => [
                'email' => $user->email,
                'role'  => $user->role,
            ],
            'token'   => $token
        ]);
    }

    public function userProfile(Request $request)
    {
        return response()->json([
            'status' => 200,
            'user'   => $request->user()
        ]);
    }

    public function userCheck(Request $request)
    {
        $accessToken = PersonalAccessToken::findToken($request->token);

        if (!$accessToken) {
            return response()->json(['user' => null], 401);
        }

        return response()->json(['user' => $accessToken->tokenable]);
    }

    public function logout(Request $request)
    {
        $accessToken = PersonalAccessToken::findToken($request->token);

        if ($accessToken) {
            $accessToken->delete();
        }

        return response()->json(['message' => 'Logged out']);
    }


    public function verifyEmail(Request $request)
    {
        try {
            $decryptedId = Crypt::decryptString($request->id);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid or expired verification link.'
            ], 400);
        }

        $user = User::find($decryptedId);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found.'
            ], 404);
        }

        if ($user->email_verified) {
            return response()->json([
                'status' => 'info',
                'message' => 'Email already verified.'
            ]);
        }

        $user->email_verified = 1;
        $user->email_verified_at = now();
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Email verified successfully.'
        ]);
    }
}
