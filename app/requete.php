<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requete extends Model
{
    protected $fillable = [
        'type', 'matiere_id', 'senior_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $rules = [
        'type' => 'required|in:"urgent","unique","repetitif"',
        'matiere_id' => 'required|exists:matieres,id',
        'soumis_par' => 'required|exists:seniors,id',

    ];

    public function plageHoraire()
    {
        return $this->hasOne('\App\PlageHoraire', 'plageHoraire_id');
    }

    public function senior()
    {
        return $this->hasOne('\App\Senior', 'soumis_par');
    }

    public function matiere()
    {
        return $this->hasOne('\App\matiere',);
    }

}
