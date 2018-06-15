<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class Soumission extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    public static $rules = [
        'requete_id' => 'required|integer|exists:requetes,id',
        'junior_id' => 'required|integer|exists:juniors,user_id',
        'proposition' => 'nullable|date',
        'acceptation' => 'nullable|date|after:proposition',
    ];

    protected $dates = [
        'acceptation',
        'proposition'
    ];

    public static function getValidation($inputs)
    {
        $validator = Validator::make($inputs, self::$rules);

        $validator->after(function ($validator) use ($inputs)
        {
            // contraintes supplémentaires
        });

        return $validator;
    }

    public static function createOne($inputs)
    {
        $new = new self();

        $new->requete_id = $inputs['requete_id'];

        $new->junior_id = $inputs['junior_id'];
        $new->proposition = Carbon::now();
        $new->hash = md5(microtime());

        $new->save();

        $requete = Requete::find($new->requete_id)->first();
        //($requete);
        return response()->json($requete, Response::HTTP_BAD_REQUEST);
        $requete->statut = 'envoye';
        $requete->save();

        return $new;
    }

    public static function find($requete_id, $junior_id)
    {
        return self::where('requete_id', '=', $requete_id)->where('junior_id', '=', $junior_id);
    }

    public function requete()
    {
        return $this->belongsTo('\App\Requete');
    }

    public function junior()
    {
        return $this->hasOne('\App\junior');
    }
}
