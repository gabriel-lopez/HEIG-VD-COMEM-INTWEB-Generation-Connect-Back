<?php

namespace App\Http\Controllers;

use App\PlageHoraire;
use App\PlageRepetitive;
use App\PlageUnique;
use App\Requete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class RequeteController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if($user->isA('junior'))
            {
                return response()
                    ->json(Requete::with([
                        'soumis_par.senior',
                        'plageHoraire',
                        'plageHoraire.plage_unique',
                        'plageHoraire.plage_horaire_repetitive',
                        'matiere',
                        'soumissions',
                        'interventions'])
                        ->where('soumis_par', '=', $user->id)
                        ->get());
            }
            else if($user->isA('senior'))
            {
                return response()
                    ->json(Requete::with([
                        'plageHoraire',
                        'plageHoraire.plage_unique',
                        'plageHoraire.plage_horaire_repetitive',
                        'matiere',
                        'interventions'])
                        ->where('soumis_par', '=', $user->id)
                        ->get());
            }
            else if($user->can(['voir-liste-requetes']))
            {
                return response()
                    ->json(Requete::with([
                        'soumis_par.senior',
                        'plageHoraire',
                        'plageHoraire.plage_unique',
                        'plageHoraire.plage_horaire_repetitive',
                        'matiere',
                        'soumissions',
                        'interventions'])
                       ->get());
            }

            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function store(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('creer-requete'))
            {
                $inputs = $request->all();

                if (Requete::getValidation($inputs)->fails())
                {
                    return response()->json(['error' => 'Requete invalide'], Response::HTTP_BAD_REQUEST);
                }

                if (!isset($inputs['plage_horaire']))
                {
                    return response()->json(['error' => 'pas de plage horaire indiqueée'], Response::HTTP_BAD_REQUEST);
                }

                if ($inputs['type'] == 'urgent' || $inputs['type'] == 'unique')
                {
                    if (PlageUnique::getValidation($inputs['plage_horaire'])->fails() &&

                        PlageHoraire::getValidation($inputs['plage_horaire'])->fails())

                        return response()->json(['error' => 'Plage_unique invalide'], Response::HTTP_BAD_REQUEST);

                }
                else if ($inputs['type'] == 'repetitif')
                {
                    if (PlageRepetitive::getValidation($inputs['plage_horaire'])->fails() &&
                        PlageHoraire::getValidation($inputs['plage_horaire'])->fails())
                        return response()->json(['error' => 'plage_repetitive invalide'], Response::HTTP_BAD_REQUEST);
                }
                else
                {
                    return response()->json(['error' => 'Bad plage_horaire input'], Response::HTTP_BAD_REQUEST);
                }

                $plage_horaire = PlageHoraire::createOne($inputs['plage_horaire']);

                $inputs['plage_horaire']['plage_horaire_id'] = $plage_horaire->id;
                $inputs['plageHoraire_id'] = $plage_horaire->id;

                if ($inputs['type'] == 'urgent' || $inputs['type'] == 'unique')
                {
                    $plage_unique = PlageUnique::createOne($inputs['plage_horaire']);
                }

                if ($inputs['type'] == 'repetitif')
                {
                    $plage_unique = PlageRepetitive::createOne($inputs['plage_horaire']);
                }

                $requete = Requete::createOne($inputs);

                //TODO pour chaque employe
                //Mail::to(/*$user->email*/'gabriel.lopez@heig-vd.ch')->send(new NouvelleRequete($user));

                return $this->show($requete->id);
            }

            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function show($id)
    {
        //TODO droit
        return response()->json($this->get($id));
    }

    public function update(Request $request, Requete $requete)
    {
        //TODO droit
    }

    public function destroy(Requete $requete)
    {
        //TODO droit
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
