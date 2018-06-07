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

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('\App\User','junior_affecte');
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
