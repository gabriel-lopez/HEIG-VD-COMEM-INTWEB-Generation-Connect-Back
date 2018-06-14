<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        return response()->json(Page::all(), Response::HTTP_OK);
    }

    public function show($id)
    {
        return response()->json(Page::find($id), Response::HTTP_OK);
    }

    public function update(Request $request, Page $page)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('modifier_contenu_page'))
            {
                $validate = Page::getValidation($request->all());

                if ($validate->fails())
                {
                    return response()->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
                }

                $page->contenu = $request->input('contenu');

                $page->save();

                return response()->json($page, Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }
}
