<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Sujet extends Model
{
    protected $fillable = [
        'nom',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    public static $rules = [
        'nom' => 'required|string|max:255|unique:sujets',
        'description' => 'required|string'
    ];

    /** Test la validité des données $input par rapport au nodèle Sujet
     * @param array $inputs
     * @return mixed
     */
    public static function getValidation(Array $inputs)
    {
        $validator = Validator::make($inputs, self::$rules);

        $validator->after(function ($validator) use ($inputs)
        {

        });

        return $validator;
    }


    /**
     * Enregistre en base de données une nouvelle matière selon les $values donnés
     * @param array $values
     */
    public static function createOne(array $values)
    {
        $new = new self();
        if(isset($values['id'])) $new->id = $values['id'];
        $new->nom = $values['nom'];
        $new->description = $values['description'];
        $new->save();
        return $new;
    }


    public static function getModifyValidation($sujet, $input)
    {
        if(!$input['nom'] == $sujet['nom']) {
            $validator = Validator::make($inputs, self::$rules);
        }
        else
        {
            $validator = Validator::make($input, ['description' => 'required|string']);
        }

       return $validator;
    }

    public static function updateOne(array $newValues, Sujet $sujet)
    {

        $sujet->nom = $newValues['nom'];
        $sujet->description = $newValues['description'];
        $sujet->save();
        return $sujet;
    }
    public function matieres()
    {
        return $this->hasMany('\App\Matiere');
    }
}
