<?php

namespace App\Http\Controllers;

use App\Requete;
use Illuminate\Http\Request;

class RequeteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(Requete::with(['soumis_par.senior','matiere', 'soumissions', 'interventions'])
            ->get()
            ->makeHidden('matiere_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = Requete::with(['soumis_par.senior','matiere', 'plageHoraire.plage_unique', 'plageHoraire.plage_horaire_repetitive'])
            ->find($id)
            ->makeHidden(['plageHoraire_id', 'matiere_id']);



        if($request && !($request->plageHoraire->plage_horaire_repetitive))
        {
            $request->plageHoraire->makeHidden('plage_horaire_repetitive');
        }
        elseif($request && !($request->plageHoraire->plage_unique))
        {
            $request->plageHoraire->makeHidden('plage_unique');
        }


        return response()->json($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requete  $requete
     * @return \Illuminate\Http\Response
     */
    public function edit(Requete $requete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requete  $requete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requete $requete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requete  $requete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requete $requete)
    {
        //
    }
}
