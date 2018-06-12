<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
     public function index()
    {
        return response()->json(Message::all());
    }

    public function store(Request $request)
    {
        //TODO
    }

    public function show($id)
    {
        $requete = Message::with('user.employe')->find($id);
        if($requete) return response()->json($requete);
        return response()->make('Erreur 404',404);
    }

    public function update(Request $request, Message $message)
    {
        //TODO
    }

    public function destroy(Message $message)
    {
        //TODO
    }
}
