<?php

namespace App\Http\Controllers;

use App\PlageHoraire;
use App\PlageRepetitive;
use App\PlageUnique;
use App\Requete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class RequeteController extends Controller
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

            // la liste doit être différente si c'est un junior, un senior ou un admin qui demande


            return response()
                ->json(Requete::with(['soumis_par.senior', 'matiere', 'soumissions', 'interventions'])
                    ->get()
                    ->makeHidden('matiere_id'));
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('creer-requete'))
            {
                $inputs = $request->all();

                if (Requete::getValidation($inputs)->fails())
                    return response()->json(['error' => 'Requete invalide'], Response::HTTP_BAD_REQUEST);

                if (!isset($inputs['plage_horaire']))
                    return response()->json(['error' => 'pas de plage horaire indiqueée'], Response::HTTP_BAD_REQUEST);

                if ($inputs['type'] == 'urgent' || $inputs['type'] == 'unique') {
                    if (PlageUnique::getValidation($inputs['plage_horaire'])->fails() &&

                        PlageHoraire::getValidation($inputs['plage_horaire'])->fails())

                        return response()->json(['error' => 'Plage_unique invalide'], Response::HTTP_BAD_REQUEST);

                } else if ($inputs['type'] == 'repetitif') {
                    if (PlageRepetitive::getValidation($inputs['plage_horaire'])->fails() &&
                        PlageHoraire::getValidation($inputs['plage_horaire'])->fails())
                        return response()->json(['error' => 'plage_repetitive invalide'], Response::HTTP_BAD_REQUEST);
                } else {
                    return response()->json(['error' => 'Bad plage_horaire input'], Response::HTTP_BAD_REQUEST);
                }


                $plage_horaire = PlageHoraire::createOne($inputs['plage_horaire']);

                $inputs['plage_horaire']['plage_horaire_id'] = $plage_horaire->id;
                $inputs['plageHoraire_id'] = $plage_horaire->id;

                if ($inputs['type'] == 'urgent' || $inputs['type'] == 'unique')
                    $plage_unique = PlageUnique::createOne($inputs['plage_horaire']);
                if ($inputs['type'] == 'repetitif')
                    $plage_unique = PlageRepetitive::createOne($inputs['plage_horaire']);

                $requete = Requete::createOne($inputs);
                return $this->show($requete->id);
            }
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function show($id)
    {
        //TODO
        return response()->json($this->get($id));
    }

    public function update(Request $request, Requete $requete)
    {
        //TODO
    }

    public function destroy(Requete $requete)
    {
        //TODO
    }

    public function get($id)
    {
        $request = Requete::with(['soumis_par.senior', 'matiere', 'plageHoraire.plage_unique', 'plageHoraire.plage_horaire_repetitive'])
            ->find($id)
            ->makeHidden(['plageHoraire_id', 'matiere_id']);

        if ($request && !($request->plageHoraire->plage_horaire_repetitive)) {
            $request->plageHoraire->makeHidden('plage_horaire_repetitive');
        } elseif ($request && !($request->plageHoraire->plage_unique)) {
            $request->plageHoraire->makeHidden('plage_unique');
        }
        return $request;
    }
}
