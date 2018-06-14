<?php

namespace App\Http\Controllers;

use App\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if($user->isA('junior'))
            {
                return response()
                    ->json(Intervention::with([
                        'junior_affecte',
                        'requete',
                        'requete.matiere',
                        'requete.matiere.sujet',
                        'requete.soumis_par'])
                        ->get());
            }

            return response()
                ->json(Intervention::with([
                    'junior_affecte',
                    'requete',
                    'requete.matiere',
                    'requete.matiere.sujet'])
                    ->get());
        }
    }

    public function store(Request $request)
    {
        //TODO
    }

    public function show($id)
    {
        //TODO gestion des droits
        return response()
            ->json(Intervention::with([
                'requete.soumis_par.senior',
                'requete.matiere',
                'junior_affecte'
                ])
                ->find($id));
    }

    public function update(Request $request, Intervention $intervention)
    {
        //TODO
    }

    public function destroy(Intervention $intervention)
    {
        //TODO
    }
}
