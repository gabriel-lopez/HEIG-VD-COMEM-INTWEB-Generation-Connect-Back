<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class PlageRepetitive extends Model
{
    use SoftDeletes;

    protected $table = 'plages_repetitives';

    public $timestamps = true;

    public static $rules = [
        'datedebut' => 'required|date',
        'datefin' => 'required|date|after:datedebut',
        'nombreoccurence' => 'nullable',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
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
        if(isset($inputs['nombreoccurence']))
        {
            $new->nombreoccurence = $inputs['nombreoccurence'];
        }
        else
        {
            $new->nombreoccurence = 1;
        }

        $new->save();

        return $new;

    }

    public function plage_horaire()
    {
        return $this->belongsTo('\App\PlageHoraire');
    }
}
