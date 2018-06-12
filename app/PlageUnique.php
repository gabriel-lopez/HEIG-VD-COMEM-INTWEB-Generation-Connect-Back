<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class PlageUnique extends Model
{
    use SoftDeletes;

    protected $table = 'plages_uniques';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected static $rules = [
        'date' => 'required|date'
    ];

    public function plage_horaire()
    {
        return $this->belongsTo('\App\PlageHoraire');
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
        $new->plage_horaire_id = $inputs['plage_horaire_id'];
        $new->date = $inputs['date'];

        $new->save();
        return $new;
    }

}
