<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Senior extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'preference'
    ];

    protected $rules = [
        'preference' => 'required|in:"email","telephone"',
    ];

    protected $hidden = [
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->hasOne('\App\User');
    }

    public function forfait()
    {
        return $this->hasOne('App\Forfait');
    }

    public function matiere()
    {
        return $this->belongsToMany('\app\Matiere');
    }

    public function soumission()
    {
        return $this->hasMany('\App\Matiere');
    }

    public function requete()
    {
        return $this->hasMany('\App\Requete', 'soumis_par');
    }


}
