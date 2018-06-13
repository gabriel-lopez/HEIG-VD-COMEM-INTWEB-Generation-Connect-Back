<?php

namespace App\Http\Controllers;

use App\Forfait;
use App\Formation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('voir-liste-formations'))
            {
                return response()->json(Formation::with('plageHoraire.plage_unique')
                    ->get()
                    ->makeHidden('plagehoraire_id'), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    public function store(Request $request)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            $inputs = $request->all();

            if($user->can('creer-formation'))
            {
                if(Formation::getValidation($inputs)->fails())
                {
                    return response()->json(["error", "Bad Request"], Response::HTTP_BAD_REQUEST);
                }

                //TODO VALIDER ET CRRER PLAGE HORAIRE

                $new_formation = Formation::createOne($inputs);

                return response()->json($new_formation, Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    public function show($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            $formations = array();

            if(($user->isA("junior")))
            {
                $formations = Formation::with(['plageHoraire.plage_unique'])
                    ->find($id)
                    ->makeHidden(['plagehoraire_id',]);
            }
            else if ($user->can('voir-formation'))
            {
                $formations = Formation::with(['plageHoraire.plage_unique', 'users'])
                    ->find($id);
            }

            return response()->json($formations, Response::HTTP_OK);
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    public function update(Request $request, Formation $formation)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('modifier-formation'))
            {
                //TODO
                //TODO AVERTIR JUNIORS INSCRITS

                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    public function destroy(Formation $formation)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('supprimer-formation'))
            {
                //TODO
                //TODO avertir les juniors inscrits que la formation est annulée
                return response()->json(['error' => 'Ok'], Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }
}
