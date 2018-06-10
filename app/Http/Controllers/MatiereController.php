<?php

namespace App\Http\Controllers;

use App\Matiere;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Matiere::with('sujet')
            ->get()
            ->makeHidden('sujet_id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::check()) {
            $user = Auth::user();

            if ($user->can('creer-matiere')) {
                $validate_matiere = Matiere::getValidation($request->all());

                // si les inputs ne sont pas valide
                if ($validate_matiere->fails()) {
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

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matiere = Matiere::with('sujet')->find($id);
        if ($matiere) $matiere->makeHidden('sujet_id');
        return response()->json($matiere);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Matiere $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matiere $matiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $matiere)
    {
        //
    }
}
