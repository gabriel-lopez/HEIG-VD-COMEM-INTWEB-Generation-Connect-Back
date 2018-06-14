<?php

namespace App\Http\Controllers;

use App\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function index()
    {
        return response()
            ->json(Intervention::with(['junior_affecte.junior'])
            ->get());
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
                'junior_affecte.junior',
                'requete.soumis_par.senior',
                'requete.matiere'
                ])
                ->find($id)
                ->makeHidden(['junior_affecte','requete_id']));
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
