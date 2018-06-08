<?php

namespace App\Http\Controllers;

use App\RapportIntervention;
use Illuminate\Http\Request;

class RapportInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RapportIntervention::with(['intervention','user'])
            ->get()
            ->makeHidden(['intervention_id','user_id']));
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
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requete = RapportIntervention::with(['intervention','user'])
            ->find($id);
        if($requete) $requete->makeHidden(['intervention_id','user_id']);

        return response()->json($requete);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RapportIntervention  $rapportIntervention
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RapportIntervention $rapportIntervention)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RapportIntervention  $rapportIntervention
     * @return \Illuminate\Http\Response
     */
    public function destroy(RapportIntervention $rapportIntervention)
    {
        //
    }
}
