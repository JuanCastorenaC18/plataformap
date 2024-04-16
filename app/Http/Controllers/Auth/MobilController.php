<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginMobilRequest;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MobilController extends Controller
{
    public function loginmobil(LoginMobilRequest $loginmobile)
    {
        $loginmobile->validated();

        $user = User::whereusuario($loginmobile->usuario)->first();
        if (!$user || !Hash::check($loginmobile->password, $user->password)) {
            return response([
                'message' => 'Invalid credentials'
            ], 422);
        }
        $token = $user->createToken('forumapp')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
