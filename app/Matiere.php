<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{

    protected $fillable = [
        'nom',
        'description'];

    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    public static $rules = [
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'sujet' => 'required|exists:sujets,nom' // le sujet d'une matière doit être dans la liste des sujets stockés dans la base
    ];

    public function sujet()
    {
        return $this->hasOne('\App\Sujet');
    }

    public function senior()
    {
        return $this->belongsToMany('\App\Senior');
    }

    public function junior()
    {
        return $this->belongsToMany('\App\Junior');
    }

    public function requete()
    {
        return $this->hasMany('\App\Requete');
    }
}
