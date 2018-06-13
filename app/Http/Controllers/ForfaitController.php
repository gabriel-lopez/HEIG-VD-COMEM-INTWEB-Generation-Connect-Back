<?php

namespace App\Http\Controllers;

use App\Forfait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ForfaitController extends Controller
{
    public function index()
    {
        return response()->json(Forfait::all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            $inputs = $request->all();

            if($user->can('creer-forfait'))
            {
                if(Forfait::getValidation($inputs)->fails())
                {
                    return response()->json(["error" => "Bad Request"], Response::HTTP_BAD_REQUEST);
                }

                $new_forfait = Forfait::createOne($inputs);

                return response()->json($new_forfait, Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    public function show($id)
    {
        return response()->json(Forfait::find($id)->first(), Response::HTTP_OK);
    }

    public function update(Request $request, Forfait $forfait)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            $inputs = $request->all();

            if($user->can('changer-forfait'))
            {
                if(Forfait::getValidation($inputs)->fails())
                {
                    return response()->json(["error" => "Bad Request"], Response::HTTP_BAD_REQUEST);
                }

                //TODO
                //TODO FAIRE UN MAIL A TOUTE LES USERS QUI ONT CE FORFAIT

                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }
}
