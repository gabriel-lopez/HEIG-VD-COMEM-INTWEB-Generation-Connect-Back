<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;
class Soumission extends Model
{
    public $timestamps = false;

    protected $dates = [
        'acceptation',
        'proposition'
    ];

    protected static $rules = [
        'requete_id' => 'required|integer|exists:requetes,id',
        'junior_id' => 'required|integer|exists:juniors,id',
        'acceptation' => 'nullable|date|after:soumission',
        'proposition' => 'required|date',
    ];

    public function requete()
    {
        return $this->belongsTo('\App\Requete');
    }

    public function junior()
    {
        return $this->hasOne('\App\junior');
    }

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
        $new->save();
        return $new;
    }


    /**
     * Réécriture de la foncton find pour une clé composée
     */
    public static function find($requete_id, $junior_id)
    {
        return Soumission::where('requete_id', '=', $requete_id)
            ->where('junior_id', '=', $junior_id);
    }

}
