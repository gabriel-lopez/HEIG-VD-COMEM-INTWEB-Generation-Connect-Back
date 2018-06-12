<?php

namespace App\Http\Controllers;

use App\Forfait;
use Illuminate\Http\Request;

class ForfaitController extends Controller
{
    public function index()
    {
        return response()->json(Forfait::all());
    }

    public function store(Request $request)
    {
        //TODO
    }

    public function show($id)
    {
        return response()->json(Forfait::find($id)->first());
    }

    public function update(Request $request, Forfait $forfait)
    {
        //TODO
    }

    public function destroy(Forfait $forfait)
    {
        //TODO
    }
}
