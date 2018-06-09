<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('creer-formation'))
            {
                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('voir-formation'))
            {
                $requete = Formation::with(['plageHoraire.plage_unique', 'users'])
                    ->find($id)->makeHidden(['plagehoraire_id',]);
                $requete->users->makehidden('pivot');
                return response()->json($requete, Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('modifier-formation'))
            {
                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('supprimer-formation'))
            {
                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }
}
