<?php

namespace App\Http\Controllers;

use App\Address;
use App\Senior;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Silber\Bouncer\BouncerFacade as Bouncer;

class InscriptionController extends Controller
{
    //TODO
    public function junior(Request $request)
    {
        $file = $request->file('cv');

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());
    }

    //TODO
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

        if ($validate_user->fails()/*|| $validate_senior->fails()*/)
        {
            return response()->json(['error' => 'Bad Request: Invalid User'], Response::HTTP_BAD_REQUEST);
        }

        if (/*$validate_user->fails()||*/ $validate_senior->fails())
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
