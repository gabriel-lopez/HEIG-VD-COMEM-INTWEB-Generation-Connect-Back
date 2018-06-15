<?php

namespace App\Http\Controllers;

use App\Intervention;
use App\Mail\NouvelleSoumission;
use App\Requete;
use App\Soumission;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SoumissionController extends Controller
{
    public function index()
    {
        //TODO gestions des droits et des différentes listes
        return response()->json(Soumission::with([
            'requete',
            'requete.matiere',
            'requete.soumis_par',
            'requete.plageHoraire'
        ])
            //->where('acceptation', '=', null)
            ->get());
    }

    public function store(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('creer-soumission'))
            {
                $inputs = $request->all();

                if (Soumission::getValidation($inputs)->fails())
                {
                    return response()->json(['error' => 'Bad Request: Soumission Invalide'], Response::HTTP_BAD_REQUEST);
                }

                $soumission = Soumission::createOne($inputs);

                $user = User::find($inputs['junior_id']);

                //TODO hardcoded email
                Mail::to(/*$user->email*/'gabriel.lopez@heig-vd.ch')->send(new NouvelleSoumission($user, $request, $soumission->hash));

                return response()->json($soumission, Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function show($requete_id, $junior_id)
    {
        //TODO Gestion des droits
        return response()->json(Soumission::find($requete_id, $junior_id), Response::HTTP_OK);
    }

    public function acceptation($requete_id, $junior_id, $hash = null)
    {
        $user = null;

        if (Auth::check() && $hash == null)
        {
            $user = Auth::user();
        }
        else if (!Auth::check() && $hash == null)
        {
            return response()->json(["error" => "Unauthorized"], Response::HTTP_UNAUTHORIZED);
        }

        $soumission = Soumission::find($requete_id, $junior_id)->first();

        if($soumission == null)
        {
            return response()->json(['error' => 'Bad Request: Soumission Inexistante'], Response::HTTP_BAD_REQUEST);
        }

        $requete = Requete::find($requete_id);

        if($requete == null)
        {
            return response()->json(['error' => 'Bad Request: Requête Inexistante'], Response::HTTP_BAD_REQUEST);
        }

        if($hash != null)
        {
            if($hash != $soumission->hash)
            {
                return response()->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
            }

            if($user->id != $junior_id)
            {
                return response()->json(["error" => "Unauthorized"], Response::HTTP_UNAUTHORIZED);
            }
        }

        $inputs = array();

        $inputs['statut'] = 'planifie';
        $inputs['finPrevu'] = $requete->plage_unique()->date . " " . $requete->plageHoraire()->heurefin;
        $inputs['debutPrevu'] = $requete->plage_unique()->date . " " . $requete->plageHoraire()->heuredebut;
        $inputs['junior_affecte_id'] = $junior_id;
        $inputs['requete_id']= $requete_id;

        $intervention = Intervention::createOne($inputs);

        $soumission->acceptation = Carbon::now();
        $soumission->save();

        $requete->statut = 'accepte';
        $requete->save();

        return response()->json([$intervention], Response::HTTP_OK);
    }

    public function refus($requete_id, $junior_id, $link_hash = null)
    {
        //TODO Gestion des droits

        $soumission = Soumission::find($requete_id, $junior_id)->first();

        if($soumission == null)
        {
            return response()->json(['error' => 'Bad Request: Soumission Inexistante'], Response::HTTP_BAD_REQUEST);
        }

        $requete = Requete::find($requete_id);

        if($requete == null)
        {
            return response()->json(['error' => 'Bad Request: Requête Inexistante'], Response::HTTP_BAD_REQUEST);
        }

        $soumission->delete();

        $requete->statut = 'nontraite';
        $requete->save();
    }
}
