<?php

namespace App\Http\Controllers;

use App\Senior;
use App\User;
use Illuminate\Http\Request;

class SeniorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::with('senior', 'adresse_habitation')->has('senior')->get());
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
     * @param  \App\Senior  $senior
     * @return \Illuminate\Http\Response
     */
    public function show(Senior $senior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Senior  $senior
     * @return \Illuminate\Http\Response
     */
    public function edit(Senior $senior)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Senior  $senior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Senior $senior)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Senior  $senior
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $senior = Senior::find($id);
        if(isset($senior)) {
            $senior->delete();
        }
    }
}
