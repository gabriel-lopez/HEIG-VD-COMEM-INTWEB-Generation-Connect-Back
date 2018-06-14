<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Intervention extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    public static $rules = [
        'statut' => 'required|in:"planifie","annule","finalise"',
        'finPrevu' => 'required|date|after:debutPrevu',
        'debutPrevu' => 'required|date',
        'junior_affecte' => 'required|integer|exists:juniors,id',
        'requete_id' => 'required|integer|exists:requetes,id',
    ];

    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function getValidation(Array $inputs)
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

        $new->statut = $inputs['statut'];
        $new->finPrevu = $inputs['finPrevu'];
        $new->debutPrevu = $inputs['debutPrevu'];
        $new->junior_affecte_id = $inputs['junior_affecte_id'];
        $new->requete_id = $inputs['requete_id'];

        $new->save();

        return $new;
    }

    public function junior_affecte()
    {
        return $this->belongsTo('\App\User', 'junior_affecte');
    }

    public function requete()
    {
        return $this->belongsTo('\App\Requete');
    }

    public function evaluationService()
    {
        return $this->belongsTo('\App\EvaluationService');
    }

    public function rapportIntervention()
    {
        return $this->belongsTo('\App\RapportIntervention');
    }
}
