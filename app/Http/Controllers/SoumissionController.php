<?php

namespace App\Http\Controllers;

use App\Mail\NouvelleSoumission;
use App\Soumission;
use App\User;
use Illuminate\Http\Response;
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
            $user = User::find($inputs[junior_id]);

            // TODO
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
        //TODO
       /* $soumission = Soumission::find($requete_id, $junior_id);

        if(!$soumission)
            return response()->json(['error' => 'soumission inexistante'], Response::HTTP_BAD_REQUEST);

        $requete = Requete::get($requete_id);

        if(!$requete)
            return response()->json(['error' => 'requete inexistante'], Response::HTTP_BAD_REQUEST);


        $intervention = new Intervention();

        $intervention->statut ='planifie';
        $intervention->finprevu =
        $intervention->debutprevu =

        // vérifie que la soumission existe
        // verifier que la requete existe

        // créer une nouvelle intervention
        // updater requete et soumission
        // retourner la nouvelle intervention créée*/
    }

    public function update(Request $request, $id)
    {
        //TODO
    }

    public function destroy($id)
    {
        //TODO
    }
}
