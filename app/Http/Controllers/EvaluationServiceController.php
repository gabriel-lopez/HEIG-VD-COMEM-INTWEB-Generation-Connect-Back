<?php

namespace App\Http\Controllers;

use App\EvaluationService;
use Illuminate\Http\Request;

class EvaluationServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(EvaluationService::with('user.senior')
            ->get());
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

    }

    /**
     * Display the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return response()
                ->json(EvaluationService::with(['user.senior', 'intervention'])
                ->find($id)->makeHidden('intervention_id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EvaluationService  $evaluationService
     * @return \Illuminate\Http\Response
     */
    public function edit(EvaluationService $evaluationService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EvaluationService  $evaluationService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EvaluationService $evaluationService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EvaluationService  $evaluationService
     * @return \Illuminate\Http\Response
     */
    public function destroy(EvaluationService $evaluationService)
    {
        //
    }
}
