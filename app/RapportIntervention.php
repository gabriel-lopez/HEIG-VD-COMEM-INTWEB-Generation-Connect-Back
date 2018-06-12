<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class RapportIntervention extends Model
{
    use SoftDeletes;

    protected $table = 'rapports_interventions';

    public $timestamps = true;

    public static $rules = [
        'servicerendu'=>'required|boolean',
        'commentaire' =>'nullable|string',
        'tempspasse' => 'required|date',// format hh:mm ?
        'fin' => 'required|date',
        'debut' =>'required|date',
        'noteSmiley' => 'required|integer|min:0|max:4',
        'intervention_id' => 'required|exists:interventions,id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'fin',
        'debut',
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

        $new->servicerendu = $inputs['servicerendu'];
        $new->commentaire = $inputs['commentaire'];
        $new->tempspasse = $inputs['tempspasse'];
        $new->fin = $inputs['fin'];
        $new->debut = $inputs['debut'];
        $new->noteSmiley = $inputs['noteSmiley'];
        $new->intervention_id = $inputs['intervention_id'];

        $new->save();

        return $new;
    }

    public function intervention()
    {
        return $this->belongsTo('\App\Intervention');
    }

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
