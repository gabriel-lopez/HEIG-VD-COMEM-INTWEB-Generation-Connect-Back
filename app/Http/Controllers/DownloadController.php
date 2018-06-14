<?php

namespace App\Http\Controllers;

use App\Fichier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function show($id)
    {
        $fichier = Fichier::find($id)->first();

        if($fichier == null)
        {
            return response()->json(['error' => 'Bad Request'], Response::HTTP_OK);
        }

        return Storage::download($fichier->path);
    }
}
