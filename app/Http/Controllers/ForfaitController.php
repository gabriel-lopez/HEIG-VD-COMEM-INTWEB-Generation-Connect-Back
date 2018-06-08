<?php

namespace App\Http\Controllers;

use App\Forfait;
use Illuminate\Http\Request;

class ForfaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Forfait::all());
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
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Forfait::find($id));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forfait  $forfait
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forfait $forfait)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forfait  $forfait
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forfait $forfait)
    {
        //
    }
}
