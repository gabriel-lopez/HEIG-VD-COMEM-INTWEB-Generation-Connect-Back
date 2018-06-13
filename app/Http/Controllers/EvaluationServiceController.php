<?php

namespace App\Http\Controllers;

use App\EvaluationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EvaluationServiceController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('voir-evalutions'))
            {
                return response()
                    ->json(EvaluationService::with('user.senior')
                        ->get(), Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    public function store(Request $request)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            $inputs = $request->all();

            if($user->can('creer-evalution'))
            {
                if(EvaluationService::getValidation($inputs)->fails())
                {
                    return response()->json(['error' => 'Bad Request'],Response::HTTP_BAD_REQUEST);
                }

                $new_evaluation = EvaluationService::createOne($inputs);

                return response()->json($new_evaluation, Response::HTTP_OK);
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }

    public function show($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('voir-evalution'))
            {
                return response()
                    ->json(EvaluationService::with(['user.senior', 'intervention'])
                        ->find($id)->makeHidden('intervention_id'));
            }
        }

        return response()->json(['error' => 'Unauthorized'],Response::HTTP_UNAUTHORIZED);
    }
}
