<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email', '');
        $motdepasse = $request->input('motdepasse', '');

        if (Auth::attempt([
            'email' => $email,
            'password' => $motdepasse,
        ]))
        {
            $user_auth = Auth::user();

            $senior = SeniorController::get($user_auth->id);

            if($senior != null)
                return $senior;

            $junior = JuniorController::get($user_auth->id);

            if($junior != null)
                return $junior;

            $employe = EmployeController::get($user_auth->id);

            if($employe != null)
                return $employe;
        }

        return response()->make("Forbidden", 403);
    }

    public function logout()
    {
        Auth::logout();

        return response()->make("ok", 200);
    }
}
