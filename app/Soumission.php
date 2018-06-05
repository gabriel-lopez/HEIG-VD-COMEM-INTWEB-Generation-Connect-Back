<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soumission extends Model
{
    protected $fillable = [
        'requete_id',
        'junior_id',
        'acceptation',
        'proposition'
    ];

    protected $dates = [
        'acceptation',
        'proposition'
    ];

    protected $rules = [
        'requete_id' => 'required|integer|exists:requete,id',
        'junior_id' => 'required|integer|exists:junior,id',
        'acceptation' => 'nullable|date|after:soumission',
        'proposition' => 'required|date',
    ];

    public function requete()
    {
        return $this->belongsTo('\App\Requete');
    }

    public function junior()
    {
        return $this->hasOne('\App\junior');
    }

}
