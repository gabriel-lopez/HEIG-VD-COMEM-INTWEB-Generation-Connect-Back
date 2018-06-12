<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Requete extends Model
{
    protected $fillable = [
        'type',
        'matiere_id',
        'senior_id'
    ];

    protected static $rules = [
        'type' => 'required|in:"urgent","unique","repetitif"',
        'matiere_id' => 'required|exists:matieres,id',
        'soumis_par' => 'required|exists:seniors,user_id',
        'plageHoraire_id' => 'exists:plages_horaires,id',
        'statut' => 'in:"nontraite","envoye","accepte"',
        'commentaire' => 'string|nullable'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function plageHoraire()
    {
        return $this->belongsTo('\App\PlageHoraire', 'plageHoraire_id');
    }

    public function senior()
    {
        return $this->belongsTo('\App\Senior', 'soumis_par');
    }

    public function soumis_par()
    {
        return $this->belongsTo('\App\User', 'soumis_par');
    }

    public function matiere()
    {
        return $this->belongsTo('\App\Matiere');
    }

    public function soumissions()
    {
        return $this->hasMany('\App\Soumission');
    }

    public function interventions()
    {
        return $this->belongsToMany('\App\Intervention');
    }

    public static function getValidation($inputs)
    {
        $validator = Validator::make($inputs, self::$rules);

        $validator->after(function ($validator) use ($inputs) {
            // contraintes supplémentaires
        });

        return $validator;

    }

    public static function createOne($inputs)
    {
        $new = new self();
        $new->type = $inputs['type'];
        $new->matiere_id = $inputs['matiere_id'];
        $new->soumis_par = $inputs['soumis_par'];
        $new->plageHoraire_id = $inputs['plageHoraire_id'];
        if (isset($inputs['statut'])) $new->statut = $inputs['statut']; // par défaut, le statut vaut nontraite
        if (isset($inputs['commentaire'])) $new->commentaire = $inputs['commentaire']; // par défaut, le statut vaut nontraite
        $new->save();
        return $new;
    }
}
