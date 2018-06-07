<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'sujet_id'];

    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $rules = [
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'sujet_id' => 'required|exists:sujets,id' // le sujet d'une matière doit être dans la liste des sujets stockés dans la base
    ];

    public function sujet()
    {
        return $this->belongsTo('\App\Sujet');
    }

    public function seniors()
    {
        return $this->belongsToMany('\App\Senior');
    }

    public function juniors()
    {
        return $this->belongsToMany('\App\Junior');
    }

    public function requetes()
    {
        return $this->hasMany('\App\Requete');
    }
}
