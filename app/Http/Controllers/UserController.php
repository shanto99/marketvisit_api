<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get_user($userId)
    {
        $user = User::find($userId);
        if(!$user)
        {
            return response()->json([
                'errors' => ['No user found'],
                'status' => 404
            ], 404);
        }
        return response()->json([
            'data' => [
                'user' => $user
            ],
            'status' => 200
        ], 200);
    }

    public function get_subordinates($userId)
    {
        $user = User::find($userId);
        if(!$user) return response()->json([
           'error' => [
               'No user found'
           ],
           'status' => 404
        ]);

        $subOrdinateIds = (new UserService())->getSubordinates($userId);

        return response()->json([
           'data' => [
               'subordinateIds' => $subOrdinateIds
           ],
            'status' => 200
        ], 200);

    }
}
