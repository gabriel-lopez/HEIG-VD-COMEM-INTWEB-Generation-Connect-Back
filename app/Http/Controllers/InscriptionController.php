<?php

namespace App\Http\Controllers;

use App\Address;
use App\Fichier;
use App\Junior;
use App\Senior;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Silber\Bouncer\BouncerFacade as Bouncer;

class InscriptionController extends Controller
{
    public function junior(Request $request)
    {
        $inputs = $request->all();

        /*$adresse_habitation = $request->input("adresse_habitation");
        $adresse_depart = $request->input("adresse_depart");
        $adresse_facturation = $request->input("adresse_facturation");

        $inputs['status'] = "candidat"; // par défaut un junior est candidat

        $validate_adresse_habitation = Address::getValidation($adresse_habitation);
        $validate_adresse_depart = Address::getValidation($adresse_habitation);
        $validate_adresse_facturation = Address::getValidation($adresse_habitation);

        $validate_user = User::getValidation($inputs);
        $validate_junior = Junior::getValidation($inputs);

        if ($validate_adresse_habitation->fails() || $validate_adresse_depart->fails() || $validate_adresse_facturation->fails())
        {
            return response()->json(['error' => 'Bad Request: Invalid Address'], Response::HTTP_BAD_REQUEST);
        }*/

        /*if ($validate_user->fails() /*|| $validate_junior->fails())
        {
            $messages = $validate_user->messages();

            return response()->json(['error' => 'Bad Request: Invalid USer', 'msg' => $messages], Response::HTTP_BAD_REQUEST);
        }

        if (/*$validate_user->fails() || $validate_junior->fails())
        {
            $messages = $validate_user->messages();

            return response()->json(['error' => 'Bad Request: Invalid Junior', 'msg' => $messages], Response::HTTP_BAD_REQUEST);
        }*/

        /*$adresse = Address::createOne($request->all());

        $request->request->add(['adresse_habitation_id' => $adresse->id]);

        $new_user = User::createOne($request->all());

        $request->request->add(['user_id' => $new_user->id]);

        $new_junior = Junior::createOne($request->all()); */

        $fichier = array();

        if ($request->hasFile('cv'))
        {
            $cv = $request->file("cv");

            $extension = $cv->getClientOriginalExtension();
            $size = $cv->getSize();
            $mime = $cv->getMimeType();

            if($extension == "pdf" && $mime == "application/pdf" && $size < 5000000)
            {
                Storage::disk('local')->put(time() . '_' . $cv->getFilename() . '.' . $extension,  $cv);

                $fichier["name"] = $cv->getClientOriginalName();
                $fichier["path"] = time() . '_' . $cv->getFilename() . '.' . $extension;
            }
            else
            {
                return response()->json(["error" => "Bad File"], Response::HTTP_BAD_REQUEST);
            }

            dd($cv);
        }

        /*$new_fichier = Fichier::createOne($fichier);

        $new_user->fichiers()->save($new_fichier);

        Bouncer::assign('junior')->to($new_user);*/

        dd($request->all);

        return response()->json("",/*JuniorController::get($new_user->id)*/ Response::HTTP_OK);
    }

    public function senior(Request $request)
    {
        $inputs = $request->all();

        $validate_address = Address::getValidation($request->all());
        $validate_user = User::getValidation($request->all());
        $validate_senior = Senior::getValidation($request->all());

        if ($validate_address->fails())
        {
            return response()->json(['error' => 'Bad Request: Invalid Address'], Response::HTTP_BAD_REQUEST);
        }

        if ($validate_user->fails() || $validate_senior->fails())
        {
            return response()->json(['error' => 'Bad Request: Invalid Senior'], Response::HTTP_BAD_REQUEST);
        }

        $adresse = Address::createOne($request->all());

        $request->request->add(['adresse_habitation_id' => $adresse->id]);

        $new_user = User::createOne($request->all());

        $request->request->add(['user_id' => $new_user->id]);

        $new_senior = Senior::createOne($request->all());

        Bouncer::assign('senior')->to($new_user);

        return response()->json(SeniorController::get($new_user->id), Response::HTTP_OK);
    }
}
