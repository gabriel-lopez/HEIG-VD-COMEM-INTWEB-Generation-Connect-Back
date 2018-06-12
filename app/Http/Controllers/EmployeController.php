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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->can('voir-employe')) {
                return response()
                    ->json(User::with('employe', 'adresse_habitation')
                        ->has('employe')
                        ->get(), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->can('creer-employe')) {
                $inputs = $request->all();

                if (Address::getValidation($inputs['adresse_habitation'])->fails())
                    return response()->json(['error' => 'Adresse_Habitation invalide'], Response::HTTP_BAD_REQUEST);

                $validate_user = User::getValidation($request->all());

                $validate_employe = Employe::getValidation($request->all());

                if ($validate_employe->fails()) {
                    return response()->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
                }

                if ($validate_user->fails()) {
                    return response()->json(['error' => 'Bad user Request'], Response::HTTP_BAD_REQUEST);
                }

                $adresse = Address::createOne($inputs['adresse_habitation']);
                $request->request->add(['adresse_habitation_id' => $adresse->id]);

                $new_user = User::createOne($request->all());

                $request->request->add(['user_id' => $new_user->id]);

                $new_employe = Employe::createOne($request->all());

                return response()->json(EmployeController::get($new_user->id), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Employe $employe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->can('voir-employe')) {
                return response()
                    ->json(User::with('employe', 'adresse_habitation')
                        ->has('employe')
                        ->find($id), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Employe $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->can(['modifier-employe'])) {
                return response()->json($employe, Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employe $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->can(['supprimer-employe'])) {
                return response()->json($employe, Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public static function get($id)
    {
        return User::with('employe', 'adresse_habitation')
            ->has('employe')
            ->find($id);
    }
}
