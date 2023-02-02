<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function login(Request $request) {
        $fields = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        $patient = Patient::where('email', $fields['email'])->first();
        if(!$patient || !Hash::check($fields['password'], $patient->password)) {
            return response([
                'message' => 'Wrong credentials'
            ], 401);
        }

        $token = $patient->createToken('ecgToken')->plainTextToken;
        $response = [
            'user' => $patient,
            'token' => $token
        ];
        return $response;
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response(['message'=> 'Logged out'], 200);
    }

    public function addTokens(Patient $patient) {
        $field = request()->validate(['Expotoken' => ['required']]);
        $patient->update(['expo_token' => $field['Expotoken']]);

        return response(['message' => 'Device Registered for notification'], 200);


    }
}
