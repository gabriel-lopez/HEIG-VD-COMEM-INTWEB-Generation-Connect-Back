<?php

namespace App\Http\Controllers;

use App\Address;
use App\Senior;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SeniorController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('voir-liste-seniors'))
            {
                return response()
                    ->json(User::with('senior', 'adresse_habitation', 'senior.forfait')
                        ->has('senior')
                        ->get(), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function store(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('creer-senior'))
            {
                $inputs = $request->all();

                $validate_address = Address::getValidation($request->all());
                $validate_user = User::getValidation($request->all());
                $validate_senior = Senior::getValidation($request->all());

                if ($validate_address->fails())
                {
                    return response()->json(['error' => 'Bad Request: Invalid Address'], Response::HTTP_BAD_REQUEST);
                }

                if ($validate_user->fails()|| $validate_senior->fails())
                {
                    return response()->json(['error' => 'Bad Request: Invalid Senior'], Response::HTTP_BAD_REQUEST);
                }

                $adresse = Address::createOne($inputs['adresse_habitation']);
                $request->request->add(['adresse_habitation_id' => $adresse->id]);

                $new_user = User::createOne($request->all());

                $request->request->add(['user_id' => $new_user->id]);

                $new_employe = Senior::createOne($request->all());

                return SeniorController::show($new_user->id);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public static function show($id)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('voir-senior'))
            {
                return response()
                    ->json(User::with('senior', 'adresse_habitation', 'senior.forfait')
                        ->has('senior')
                        ->find($id));
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function update(Request $request, Senior $senior)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('modifier-senior'))
            {
                //TODO update senior
                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function destroy($id)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('supprimer-senior'))
            {
                $senior = Senior::find($id);

                if (isset($senior))
                {
                    $senior->delete();

                    return response()->json(['error' => 'Ok'], Response::HTTP_OK);
                }
                else
                    {
                    return response()->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
                }
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public static function get($id)
    {
        return User::with('senior', 'adresse_habitation', 'senior.forfait')
            ->has('senior')
            ->find($id);
    }
}
