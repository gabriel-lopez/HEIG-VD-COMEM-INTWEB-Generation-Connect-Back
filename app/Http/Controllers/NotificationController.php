<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index()
    {
        // retourner les notification appartenant à l'utilisateur qui les demande
    }

    public function show($id)
    {
        // il faut faire en sorte qu'un juniour ou senior ne puisse accéder qu'à ses notifications
        return  response()->json(
            Notification::with('user')->find($id));
    }
}
