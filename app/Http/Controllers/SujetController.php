<?php

namespace App\Http\Controllers;

use App\Sujet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SujetController extends Controller
{
    public function index()
    {
        $sujets = Sujet::with('matieres')->get();

        foreach ($sujets as $sujet)
        {
            foreach ($sujet->matieres as $matiere)
            {
                $matiere->makeHidden('sujet_id');
            }
        }

        return response()->json($sujets, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('creer-sujet'))
            {
                $validate_sujet = Sujet::getValidation($request->all());

                // si les inputs ne sont pas valide
                if ($validate_sujet->fails())
                {
                    return response()->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
                }

                // Si la validation se passe normaleement
                $new_sujet = Sujet::createOne($request->all());

                return $this->show($new_sujet->id);

            }
            // Si l'utilisateur n'a pas les droits
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }


    public function show($id)
    {
        $sujet = Sujet::with('matieres')->find($id);

        if ($sujet)
        {
            foreach ($sujet->matieres as $matiere)
            {
                $matiere->makeHidden('sujet_id');
            }
        }

        return response()->json($sujet);
    }


    public function update(Request $request, $id)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('modifier-sujet'))
            {

                $sujet = Sujet::find($id);

                if($sujet)
                {
                    $validation = Sujet::getModifyValidation($sujet, $request->all());
                    if ($validation->fails())return response()->json(['error' => 'Erreur, objet non valide'], Response::HTTP_BAD_REQUEST);

                    $sujet = Sujet::updateOne($request->all(), $sujet);
                    return $this->show($sujet->id);
                }

                return response()->json(['error' => 'Sujet inexistant'], Response::HTTP_BAD_REQUEST);
            }
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function destroy(Sujet $sujet)
    {
        //TODO
    }
}
