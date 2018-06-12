<?php

namespace App\Http\Controllers;

use App\Intervention;
use App\Requete;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Soumission;
use Illuminate\Support\Facades\Mail;
use App\Mail\NouvelleSoumission;

class SoumissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Soumission::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->can('creer-soumission')) {
            $inputs = $request->all();

            if (!Soumission::getValidation($inputs))
                return response()->json(['error' => 'soumission invalide'], Response::HTTP_BAD_REQUEST);

            $soumission = Soumission::createOne($inputs);

           // Mail::to(/*User::find($soumission->junior_id)*/ 'etienne.rallu@gmail.com')->send(new NouvelleSoumission('mailDeTest asopidjf'));
            return $this->show($soumission->requete_id, $soumission->junior_id);
        }
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show($requete_id, $junior_id)
    {
        return response()->json(Soumission::find($requete_id, $junior_id));
    }


    public function acceptation($requete_id, $junior_id, $link_hash = null)
    {
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



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
