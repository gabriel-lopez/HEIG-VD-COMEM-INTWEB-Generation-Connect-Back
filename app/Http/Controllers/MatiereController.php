<?php

namespace App\Http\Controllers;

use App\Matiere;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MatiereController extends Controller
{
    //TODO
    public function index()
    {
        return response()->json(Matiere::with('sujet')
            ->get()
            ->makeHidden('sujet_id'));
    }

    public function store(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('creer-matiere'))
            {
                $validate_matiere = Matiere::getValidation($request->all());

                // si les inputs ne sont pas valide
                if ($validate_matiere->fails())
                {
                    return response()->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
                }

                // Si la validation se passe normaleement
                $new_matiere = Matiere::createOne($request->all());
                return $this->show($new_matiere->id);

            }
            // Si l'utilisateur n'a pas les droits
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

     public function show($id)
    {
        //TODO
        $matiere = Matiere::with('sujet')->find($id);
        if ($matiere) $matiere->makeHidden('sujet_id');
        return response()->json($matiere);
    }

    public function update(Request $request, $id)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->can('modifier-matiere'))
            {
                $matiereAModifier = Matiere::find($id);

                if ($matiereAModifier)
                {
                    $validate_matiere = Matiere::getValidation($request->all());

                    // si les inputs ne sont pas valide
                    if ($validate_matiere->fails()) {
                        return response()->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
                    }

                    // Si la validation se passe normaleement
                    $matiereAModifier = Matiere::updateOne( $request->all(), $matiereAModifier);
                    return $this->show($matiereAModifier->id);

                }

                return response()->json(['error' => 'Matiere Inexistante'], Response::HTTP_UNAUTHORIZED);
            }
            // Si l'utilisateur n'a pas les droits
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);

        }
    }

    public function destroy(Matiere $matiere)
    {
        //TODO
    }
}
