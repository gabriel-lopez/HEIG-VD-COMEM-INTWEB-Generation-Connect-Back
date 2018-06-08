<?php

namespace App\Http\Controllers;

use App\Employe;
use App\User;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(User::with('employe', 'adresse_habitation')
            ->has('employe')
            ->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()
            ->json(User::with('employe', 'adresse_habitation')
                ->has('employe')
                ->find($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        //
    }

    public static function get($id)
    {
        return User::with('employe', 'adresse_habitation')
            ->has('employe')
            ->find($id);
    }
}
