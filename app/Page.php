<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;

class Page extends Model
{
    public $timestamps = true;

    public static $rules = [
        'nom' => 'string|min:1|max:255|unique:pages',
        'contenu' => 'required|string|min:1'
    ];

    protected $hidden = [
        'created_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Valide les $inputs pour l'édition d'une Page
     * @param Array $inputs The inputs to validate
     * @return Validator
     */
    public static function getValidation(Array $inputs)
    {
        // Création du validateur
        $validator = Validator::make($inputs, self::$rules);
        // Ajout des contraintes supplémentaires
        $validator->after(function ($validator) use ($inputs)
        {
            /*$sinistre = self::find($inputs['reference'], $inputs['date']);

            // Vérification de la non-existence du Sinistre
            if ($sinistre !== null) {
                $validator->errors()->add('exists', Message::get('sinistre.exists'));
            }*/
        });
        // Renvoi du validateur
        return $validator;
    }

    public function employe()
    {
        return $this->belongsTo('\App\Employe');
    }
}
