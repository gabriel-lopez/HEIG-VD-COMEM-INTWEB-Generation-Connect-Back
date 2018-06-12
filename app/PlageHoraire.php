<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class PlageHoraire extends Model
{
    use SoftDeletes;

    protected $table = 'plages_horaires';

    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected static    $rules = [
        'joursemaine' => 'required|in:lundi,mardi,mercredi,jeudi,vendredi',
        'heuredebut'=> 'date_format:"H:i"|required',
        'heurefin' => 'date_format:"H:i"|required|after:heuredebut',
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
        $new->joursemaine = $inputs['joursemaine'];
        $new->heuredebut = $inputs['heuredebut'];
        $new->heurefin = $inputs['heurefin'];

        $new->save();
        return $new;
    }

    public function plage_unique()
    {
        return $this->hasOne('\App\PlageUnique','plage_horaire_id');
    }

    public function plage_horaire_repetitive()
    {
        return $this->hasOne('\App\PlageRepetitive', 'plage_horaire_id');
    }

    public function juniors()
    {
        return $this->belongsToMany('\App\Junior');
    }
}
