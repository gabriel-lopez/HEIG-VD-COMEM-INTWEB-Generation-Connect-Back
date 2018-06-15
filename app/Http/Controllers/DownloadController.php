<?php

namespace App\Http\Controllers;

use App\Fichier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public function show($id)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            $fichier = Fichier::find($id);

            if ($fichier != null)
            {
                return response()->download(storage_path("app/" . $fichier->path));
            }

            return response()->json(['error' => 'Bad Request'], Response::HTTP_OK);
        }

        return response()->json(["error" => "Unauthorized"], Response::HTTP_UNAUTHORIZED);
    }

    public function upload(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($request->hasFile('cv'))
            {
                $cv = $request->file("cv");

                $extension = $cv->getClientOriginalExtension();
                $size = $cv->getSize();
                $mime = $cv->getMimeType();

                if($extension == "pdf" && $mime == "application/pdf" && $size < 5000000)
                {
                    $name = time() . '_' . $cv->getFilename() . '.' . $extension;

                    $cv->storeAs('', $name);

                    $fichier["nom"] = $cv->getClientOriginalName();
                    $fichier["path"] = $name;
                    $fichier["user_id"] = $user->id;

                    $new_fichier = Fichier::createOne($fichier);

                    $user->fichiers()->save($new_fichier);

                    return response()->json($new_fichier, Response::HTTP_OK);
                }
                else
                {
                    return response()->json(["error" => "Bad File"], Response::HTTP_BAD_REQUEST);
                }
            }
        }

        return response()->json(["error" => "Unauthorized"], Response::HTTP_UNAUTHORIZED);
    }
}
