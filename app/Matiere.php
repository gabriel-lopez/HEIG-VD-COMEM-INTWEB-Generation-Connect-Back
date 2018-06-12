<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Matiere extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    public static $rules = [
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'sujet_id' => 'required|exists:sujets,id' // le sujet d'une matière doit être dans la liste des sujets stockés dans la base
    ];

    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function getValidation($inputs)
    {
        return Validator::make($inputs, self::$rules);
    }

    public static function createOne($inputs)
    {
        $new = new self();
        $new->nom = $inputs['nom'];
        $new->description = $inputs['description'];
        $new->sujet_id = $inputs['sujet_id'];
        $new->save();
        return $new;
    }

    public static function updateOne(array $newValues, Matiere $matiere)
    {

        $matiere->nom = $newValues['nom'];
        $matiere->description = $newValues['description'];
        $matiere->sujet_id = $newValues['sujet_id'];
        $matiere->save();
        return $matiere;
    }

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
