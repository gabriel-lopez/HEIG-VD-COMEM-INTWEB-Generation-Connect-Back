<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class Senior extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'user_id';

    public $timestamps = true;

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'preference' => 'required|in:"email","telephone"',
    ];

    protected $hidden = [
        'user_id',
        'forfait_id',
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

    public static function createOne(array $values)
    {
        $new = new self();

        $new->user_id = $values['user_id'];
        $new->preference = $values['preference'];

        $new->forfait_id = $values['forfait_id'];

        $new->save();

        return $new;
    }

    public function forfait()
    {
        return $this->belongsTo('App\Forfait');
    }

    public function matieres()
    {
        return $this->belongsToMany('\app\Matiere');
    }

    public function EvaluationService()
    {
        return $this->hasMany('\App\EvaluationService');
    }

    public function user()
    {
        return $this->belongsTo('\App\User');
    }


/*
    public function soumission()
    {
        return $this->hasMany('\App\Matiere');
    }

    public function requete()
    {
        return $this->hasMany('\App\Requete', 'soumis_par');
    }*/
}
