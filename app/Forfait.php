<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Forfait extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    public static $rules = [
        'nom' => 'required|string|max:255',
        'description' => 'required|string|min:1',
        'prix' => 'required|numeric|',
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
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
        $new->description = $inputs['description'];
        $new->prix = $inputs['prix'];

        $new->save();

        return $new;
    }

    public function senior()
    {
        return $this->hasMany("\App\Senior");
    }
}
