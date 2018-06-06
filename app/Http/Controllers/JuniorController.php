<?php

namespace App\Http\Controllers;

use App\Junior;
use App\User;
use Illuminate\Http\Request;

class JuniorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::with('junior', 'adresse_habitation')->has('junior')->get());
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
     * @param  \App\Junior  $junior
     * @return \Illuminate\Http\Response
     */
    public function show(Junior $junior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Junior  $junior
     * @return \Illuminate\Http\Response
     */
    public function edit(Junior $junior)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Junior  $junior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Junior $junior)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Junior  $junior
     * @return \Illuminate\Http\Response
     */
    public function destroy(Junior $junior)
    {
        //
    }
}
