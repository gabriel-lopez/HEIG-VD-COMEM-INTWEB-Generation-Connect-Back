<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            {
                return $senior;
            }

            $junior = JuniorController::get($user_auth->id);

            if($junior != null)
            {
                return $junior;
            }

            $employe = EmployeController::get($user_auth->id);

            if($employe != null)
            {
                return $employe;
            }
        }

        return response()->make(['error' => 'Forbidden'], Response::HTTP_FORBIDDEN);
    }

    public function logout()
    {
        Auth::logout();

        return response()->make(['error' => 'Ok'], Response::HTTP_OK);
    }
}
