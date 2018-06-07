<?php

namespace App\Http\Controllers;

use App\Sujet;
use Illuminate\Http\Request;

class SujetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sujets = Sujet::with('matieres')->get();

        foreach ($sujets as $sujet) {
            foreach ($sujet->matieres as $matiere) {
                $matiere->makeHidden('sujet_id');
            }
        }
        return response()->json($sujets);
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
     * @param  \Illuminate\Http\Request $request
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
        $sujet = Sujet::with('matieres')->find($id);
        if ($sujet) {
            foreach ($sujet->matieres as $matiere) {
                $matiere->makeHidden('sujet_id');
            }
        }
        return response()->json($sujet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sujet $sujet
     * @return \Illuminate\Http\Response
     */
    public function edit(Sujet $sujet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Sujet $sujet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sujet $sujet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sujet $sujet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sujet $sujet)
    {
        //
    }
}
