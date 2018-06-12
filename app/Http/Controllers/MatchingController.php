<?php

namespace App\Http\Controllers;

use App\Address;
use App\Junior;
use App\Matiere;
use App\PlageHoraire;
use App\Requete;
use App\User;
use GoogleMaps;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MatchingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        // trying to gecode origin
        /*$place = json_decode(
            GoogleMaps::load('geocoding')
                ->setParamByKey('place_id', $origin->predictions[0]->place_id)
                ->get()
        );/

        // Mapper::map($place->results[0]->geometry->location->lat, $place->results[0]->geometry->location->lng, ['eventBeforeLoad' => 'addRoute(map_0);']);

        // trying to calculate route
        $route = json_decode(GoogleMaps::load('directions')
            ->setParam([
                'origin' => $origin->predictions[0]->description,
                'destination' => $destination->predictions[0]->description,
                'travelmode' => 'WALKING'
            ])
            ->get());

        return response()->json($route, Response::HTTP_OK);*/
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requete = Requete::find($id);
        $senior = User::find($requete->soumis_par);
        $address = Address::find($senior->adresse_habitation_id);
        $matiere = Matiere::find($requete->matiere_id);
        $plage_horaire = PlageHoraire::find($requete->plageHoraire_id);

        $all_juniors = User::with('junior',
            'junior.matieres',
            'junior.plageshoraires')
            ->has('junior')
            ->get();

        $address_senior_input = $address->ligne1 . " " .
            $address->ligne2 . " " .
            $address->ligne3 . " " .
            // $address->npa . " " .
            $address->ville;

        // trying to locate the destination
        $destination = json_decode(
            GoogleMaps::load('placeautocomplete')
                ->setParam([
                    'input' => $address_senior_input
                ])
                ->get()
        );

        $selected_juniors = array();

        foreach ($all_juniors as $junior)
        {
            $collection = $junior->junior->matieres;

            // verifier si le junior possède la matière
            if ($collection->contains('id', $matiere->id))
            {
                // verifier que le junior est dispo à cette période là
                return response()->json($junior, Response::HTTP_OK);

                // verifier que le junior est pas déjà engagé à cette période là

                // verifier que le temps de trajet est inferieur à celui desirer
                // trying to locate destination
                $origin = json_decode(
                    GoogleMaps::load('placeautocomplete')
                        ->setParam(['input' =>'coop pronto yverdon-les-bains'])
                        ->get()
                );

                $routes_transit = json_decode(GoogleMaps::load('directions')
                    ->setParam([
                        'origin' => $origin->predictions[0]->description,
                        'destination' => $destination->predictions[0]->description,
                        'mode' => 'transit' // driving, walking
                    ])
                    ->get());

                $distance = $routes_transit->routes[0]->legs[0]->distance->value; // en mètres
                $time = $routes_transit->routes[0]->legs[0]->duration->value; // en secondes
                $time_minutes = $time / 60;

                if($time_minutes > $junior->junior->LimiteTempsTransport)
                {
                   continue;
                }

                $candidat = new \stdClass;

                $candidat->user = $junior;
                $candidat->route = $routes_transit;

                // si tout est OK, le junior peut être selectionner
                array_push($selected_juniors, $candidat);
            }
        }

        return response()->json($selected_juniors, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
