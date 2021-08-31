<?php

namespace App\Http\Controllers;

use App\Models\SubordinateMap;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'UserID' => 'required|unique:UserManager',
            'UserName' => 'required|unique:UserManager',
            'Designation' => 'required',
            'Email' => 'required|email|unique:UserManager',
            'MobileNo' => 'required|unique:UserManager',
            'Password' => 'required'
        ]);

        $registrationData = $request->only(['UserID', 'UserName', 'Designation', 'Email', 'MobileNo', 'TerritoryID']);
        $registrationData['Password'] = bcrypt($request->Password);

        $user = User::create($registrationData);

        if($request->has('SupervisorID')) {
            SubordinateMap::create([
                'SupervisorID' => $request->SupervisorID,
                'SubordinateID' => $user->UserID
            ]);
        }

        return response()->json([
           'data' => [
               'user' => $user,
           ],
           'status' => 200
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'UserID' => 'required',
            'Password' => 'required'
        ]);

        $user = User::find($request->UserID);
        if($user && Hash::check($request->Password, $user->Password)) {
            return response()->json([
                'data' => [
                    'token' => $user->createToken($user->UserName)->plainTextToken,
                    'user' => $user
                ],
                'status' => 200
            ], 200);
        }
        return response()->json([
            'errors' => [
                'Invalid credentials'
            ],
            'status' => 401
        ], 401);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
           'message' => 'Logged out successfully',
           'status' => 200
        ], 200);
    }
}
