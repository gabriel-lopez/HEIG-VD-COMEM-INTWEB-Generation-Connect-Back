<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        //TODO
    }

    public function show($id)
    {
        //TODO Gestion des droits et des roles

        return  response()->json(Notification::with('user')->find($id));
    }
}
