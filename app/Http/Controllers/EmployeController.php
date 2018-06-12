<?php

namespace App\Http\Controllers;

use App\Address;
use App\Employe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('voir-liste-employes'))
            {
                return response()
                    ->json(User::with('employe', 'adresse_habitation')
                        ->has('employe')
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

            if ($user->can('creer-employe'))
            {
                $validation_adresse = Address::getValidation($request->all());
                $validation_user = User::getValidation($request->all());
                $validation_employe = Employe::getValidation($request->all());

                if ($validation_adresse->fails() || $validation_employe->fails() || $validation_user->fails())
                {
                    return response()->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
                }

                $new_address = Address::createOne($request->all());

                $request->request->add(['adresse_habitation_id' => $new_address->id]);

                $new_user = User::createOne($request->all());

                $request->request->add(['user_id' => $new_user->id]);

                $new_employe = Employe::createOne($request->all());

                return response()->json(EmployeController::get($new_user->id), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function show($id)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('voir-employe'))
            {
                return response()
                    ->json(User::with('employe', 'adresse_habitation')
                        ->has('employe')
                        ->find($id), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function update(Request $request, Employe $employe)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can(['modifier-employe']))
            {
                $inputs = $request->all();

                if (Address::getValidation($inputs)->fails())
                {
                    return response()->json(['error' => 'Bad Request: Adresse Invalide'], Response::HTTP_BAD_REQUEST);
                }

                if (User::getValidation($inputs)->fails() || Employe::getValidation($inputs)->fails())
                {
                    return response()->json(['error' => 'Bad Request: Employé Invalide'], Response::HTTP_BAD_REQUEST);
                }

                //TODO update address
                User::where('id', $employe->user_id)->update($request->all());
                Employe::where('user_id', $employe->user_id)->update($request->all());

                return response()->json($employe, Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function destroy(Employe $employe)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can(['supprimer-employe']))
            {
                //TODO VERIFIER CASCADE ?
                $employe->delete();
                return response()->json($employe, Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    //TODO SORTIR CECI DU CONTROLLEUR
    public static function get($id)
    {
        return User::with('employe', 'adresse_habitation')
            ->has('employe')
            ->find($id);
    }
}
