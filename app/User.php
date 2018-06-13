<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasRolesAndAbilities;

    public $timestamps = true;

    public static $rules = [
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'telephone' => 'required|phone:CH',
        //Checks for valid password with a minimum of 6 characters and maximum of 64 characters,
        // containing at least one digit, one upper case letter, one lower case letter and one special symbol.
        'motdepasse' => 'required|password',
        'adresse_habitation_id' => 'exists:addresses,id'
    ];

    protected $hidden = [
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

        $new->prenom = $values['prenom'];
        $new->nom = $values['nom'];
        $new->email = $values['email'];
        $new->telephone = $values['telephone'];
        $new->motdepasse = bcrypt($values['motdepasse']);
        $new->remember_token = str_random(10);

        $new->adresse_habitation_id = $values['adresse_habitation_id'];

        $new->save();

        return $new;
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

    public function notifications()
    {
        return $this->hasMany('\App\Notification');
    }
}
