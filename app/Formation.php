<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Formation extends Model
{
    public $timestamps = true;

    public static $rules = [
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

    public static function getValidation(Array $inputs)
    {
        $validator = Validator::make($inputs, self::$rules);

        $validator->after(function ($validator) use ($inputs)
        {
            // contraintes supplémentaires
        });

        return $validator;
    }

    public static function createOne($inputs)
    {
        $new = new self();

        $new->nom = $inputs['nom'];
        $new->plageHoraire = $inputs['plageHoraire'];
        $new->description = $inputs['description'];

        $new->save();

        return $new;
    }

    public function plageHoraire()
    {
        return $this->belongsTo('\App\PlageHoraire','plagehoraire_id');
    }

    public function users()
    {
        return $this->belongsToMany('\App\User');
    }
}
