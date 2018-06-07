<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Soumission extends Model
{
    public $timestamps = false;

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
