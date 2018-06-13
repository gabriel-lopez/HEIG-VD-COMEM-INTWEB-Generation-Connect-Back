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
        //TODO GESTION DES DROITS
        return response()->json(Soumission::all());
    }

    public function store(Request $request)
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

            // TODO
            // utilisation possible du système à l'avenir
            // $notification = Notification::createOne($soumission->junior_id, $soumission->requete_id,  "email");
            Mail::to($user->email)->send(new NouvelleSoumission($user, $request, ""));

            return response()->json($soumission, Response::HTTP_OK);
        }
    }

    public function show($requete_id, $junior_id)
    {
        //TODO GESTION DES DROITS
        return response()->json(Soumission::find($requete_id, $junior_id), Response::HTTP_OK);
    }

    public function acceptation($requete_id, $junior_id, $link_hash = null)
    {
        $soumission = Soumission::find($requete_id, $junior_id);

        if($soumission == null)
        {
            return response()->json(['error' => 'Bad Request: Soumission Inexistante'], Response::HTTP_BAD_REQUEST);
        }

        $requete = Requete::find($requete_id);

        if(!$requete)
        {
            return response()->json(['error' => 'Bad Request: Requête Inexistante'], Response::HTTP_BAD_REQUEST);
        }

        $inputs = array();

        $inputs['statut'] = 'planifie';
        $inputs['finPrevu'] = '2018-01-01';
        $inputs['debutPrevu'] = '2018-01-01';
        $inputs['junior_affecte'] = $junior_id;
        $inputs['requete_id']= $requete_id;

        $intervention = Intervention::createOne($inputs);

        $soumission->acceptation = Carbon::now();
        $soumission->save();

        $requete->statut = 'accepte';
        $requete->save();

        return $intervention;
    }
}
