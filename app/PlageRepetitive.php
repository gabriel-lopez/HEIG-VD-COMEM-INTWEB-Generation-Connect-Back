<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class PlageRepetitive extends Model
{
    use SoftDeletes;

    protected $table = 'plages_repetitives';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected static $rules = [
        'datedebut' => 'required|date',
        'datefin' => 'required|date|after:datedebut',
        'nombreoccurence' => 'nullable',
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
        $new->plage_horaire_id = $inputs['plage_horaire_id'];
        $new->datedebut = $inputs['datedebut'];
        $new->datefin = $inputs['datefin'];
        $new->nombreoccurence = 1;
        if(isset($inputs['nombreoccurence'])) $new->nombreoccurence = $inputs['nombreoccurence'];
        $new->save();
        return $new;
    }

    public function plage_horaire()
    {
        return $this->belongsTo('\App\PlageHoraire');
    }


}
