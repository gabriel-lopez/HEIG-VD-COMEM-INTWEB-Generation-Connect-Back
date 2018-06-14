<?php

namespace App\Http\Controllers;

use App\Address;
use App\Junior;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class JuniorController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('voir-liste-juniors'))
            {
                return response()
                    ->json(User::with(
                        'junior',
                        'adresse_habitation',
                        'junior.adresse_de_depart',
                        'junior.adresse_de_facturation',
                        'junior.matieres',
                        'junior.plageshoraires',
                        'fichiers',
                        'roles')
                        ->has('junior')
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

            if ($user->can('creer-junior'))
            {
                $inputs = $request->all();

                //TODO CECI EST FAUX
                /*if (Address::getValidation($inputs['adresse_habitation'])->fails())
                    return response()->json(['error' => 'Adresse_Habitation invalide'], Response::HTTP_BAD_REQUEST);

                if (isset($inputs['AdresseDeDepart'])) {
                    $adresseDeDepart = Address::createOne($inputs['AdresseDeDepart']);
                    $request->request->add(['AdresseDeDepart' => $adresseDeDepart->id]);
                } else {
                    $request->request->add(['AdresseDeDepart' => $adresse->id]);
                }

                if (isset($inputs['AdresseFacturation'])) {
                    $adresseDeDepart = Address::createOne($inputs['AdresseDeDepart']);
                    $request->request->add(['AdresseFacturation' => $adresseDeDepart->id]);
                } else {
                    $request->request->add(['AdresseFacturation' => $adresse->id]);
                }
                if (!isset($inputs['status'])) $request->request->add(['status' => 'candidat']);

                $adresse = Address::createOne($inputs['adresse_habitation']);
                $request->request->add(['adresse_habitation_id' => $adresse->id]);*/

                $validate_user = User::getValidation($request->all());

                $validate_junior = Junior::getValidation($request->all());

                if ($validate_junior->fails())
                {
                    dd($validate_junior->failed());
                    return response()->json(['error' => 'Bad junior properties'], Response::HTTP_BAD_REQUEST);
                }

                if ($validate_user->fails())
                {
                    return response()->json(['error' => 'Bad user properties'], Response::HTTP_BAD_REQUEST);
                }

                $new_user = User::createOne($request->all());

                $request->request->add(['user_id' => $new_user->id]);

                $new_junior = Junior::createOne($request->all());

                return response()->json(JuniorController::get($new_user->id), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public static function show($id)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('voir-junior'))
            {
                return response()
                    ->json(User::with(
                        'junior',
                        'adresse_habitation',
                        'junior.adresse_de_depart',
                        'junior.adresse_de_facturation',
                        'junior.matieres',
                        'junior.plageshoraires',
                        'fichiers',
                        'roles')
                        ->has('junior')
                        ->find($id), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function update(Request $request, $id)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('modifier-junior'))
            {
                //TODO
                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function destroy(Junior $junior)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('supprimer-junior'))
            {
                //TODO
                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public static function get($id)
    {
        return User::with(
            'junior',
            'adresse_habitation',
            'junior.adresse_de_depart',
            'junior.adresse_de_facturation',
            'junior.matieres',
            'junior.plageshoraires',
            'fichiers',
            'roles')
            ->has('junior')
            ->find($id);
    }
}
