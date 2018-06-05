<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'nom',
        'plageHoraire',
        'description',
    ];

    protected $rules = [
        'nom' => 'required|in:"actif","inactif"',
        'plageHoraire' => 'exists:plagehoraires,id',
        'description' => 'required|string|min:1',
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
}
