<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function loginmobil(LoginRequest $request)
    {
        $user = User::whereUsername($request->usuario)->first();
        if (!$user|| Hash::check($request->password, $user->password)) {
           return response([
            'message'=> 'Invalid credentials'
           ], 442);
        }
    }
}
