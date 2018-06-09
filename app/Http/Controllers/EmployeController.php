<?php

namespace App\Http\Controllers;

use App\Employe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('voir-employe'))
            {
                return response()
                    ->json(User::with('employe', 'adresse_habitation')
                        ->has('employe')
                        ->get(), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('creer-employe'))
            {


                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('voir-employe'))
            {
                return response()
                    ->json(User::with('employe', 'adresse_habitation')
                        ->has('employe')
                        ->find($id), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
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
        if(Auth::check())
        {
            $user = Auth::user();

            if ($user->can(['modifier-employe']))
            {
                return response()->json($employe,Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if ($user->can(['supprimer-employe']))
            {
                return response()->json($employe,Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    public static function get($id)
    {
        return User::with('employe', 'adresse_habitation')
            ->has('employe')
            ->find($id);
    }
}
