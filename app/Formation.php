<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    public $timestamps = true;

    protected $rules = [
        'nom' => 'required|in:"actif","inactif"',
        'plageHoraire' => 'exists:plagehoraires,id',
        'description' => 'required|string|min:1',
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

    public function plageHoraire()
    {
        return $this->belongsTo('\App\PlageHoraire','plagehoraire_id');
    }

    public function users()
    {
        return $this->belongsToMany('\App\User');
    }
}
