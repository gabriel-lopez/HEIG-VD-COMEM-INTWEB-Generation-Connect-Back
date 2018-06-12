<?php

namespace App\Http\Controllers;

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

            if($user->can('creer-formation'))
            {
                //TODO
                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    public function show($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('voir-formation'))
            {
                //TODO

                $requete = Formation::with(['plageHoraire.plage_unique', 'users'])->find($id)->makeHidden(['plagehoraire_id',]);
                $requete->users->makehidden('pivot');

                return response()->json($requete, Response::HTTP_OK);
            }
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

                return response()->json(['error' => 'Ok'], Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }
}
