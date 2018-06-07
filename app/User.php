<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = true;

    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'telephone',
        'motdepasse',
    ];

    protected $rules = [
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'telephone' => 'required|phone:CH',
        /*
         * The password contains characters from at least three of the following five categories:
         * - English uppercase characters (A – Z)
         * - English lowercase characters (a – z)
         * - Base 10 digits (0 – 9)
         * - Non-alphanumeric (For example: !, $, #, or %)
         * - Unicode characters
         */
        'motdepasse' => 'required|confirmed|string|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
    ];

    protected $hidden = [
        'adresse_habitation_id',
        'motdepasse',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'pivot',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getAuthPassword()
    {
        return $this->motdepasse;
    }

    public function senior()
    {
        return $this->hasOne('\App\Senior');
    }

    public function junior()
    {
        return $this->hasOne('\App\Junior');
    }

    public function employe()
    {
        return $this->hasOne('\App\Employe');
    }

    public function adresse_habitation()
    {
        return $this->belongsTo('\App\Address');
    }
}
