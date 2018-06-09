<?php

namespace App\Http\Controllers;

use App\Senior;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SeniorController extends Controller
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

            if ($user->can('voir-liste-seniors'))
            {
                return response()
                    ->json(User::with('senior', 'adresse_habitation', 'senior.forfait')
                        ->has('senior')
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

            if ($user->can('creer-senior'))
            {
                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Senior  $senior
     * @return \Illuminate\Http\Response
     */
    public static function show($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if ($user->can('voir-senior'))
            {
                return response()
                    ->json(User::with('senior', 'adresse_habitation', 'senior.forfait')
                        ->has('senior')
                        ->find($id));
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
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
        if(Auth::check())
        {
            $user = Auth::user();

            if ($user->can('modifier-senior'))
            {
                return response()->json("", Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Senior  $senior
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if ($user->can('supprimer-senior'))
            {
                $senior = Senior::find($id);

                if(isset($senior))
                {
                    $senior->delete();

                    return response()->json(['error' => 'Ok'], Response::HTTP_OK);
                }
                else
                {
                    return response()->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
                }
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    public static function get($id)
    {
        return User::with('senior', 'adresse_habitation', 'senior.forfait')
            ->has('senior')
            ->find($id);
    }
}
