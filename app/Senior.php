<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Senior extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'user_id';

    public $timestamps = true;

    protected $fillable = [
        'preference'
    ];

    protected $rules = [
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
