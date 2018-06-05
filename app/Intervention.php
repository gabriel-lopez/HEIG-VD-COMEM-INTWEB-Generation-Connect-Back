<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{

    protected $rules = [
        'statut' => 'required|in:"planifie","annule","finalise"',
        'finPrevu' => 'required|date|after:debutPrevu',
        'debutPrevu' => 'required|date',
        'junior_affecte' => 'required|integer|exists:juniors,id',
        'requete_id' => 'required|integer|exists:requetes,id',
    ];

    public function junior()
    {
        return $this->hasOne('\App\Junior');
    }

    public function requete()
    {
        return $this->hasOne('\App\Requete');
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
