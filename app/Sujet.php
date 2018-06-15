<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Sujet extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    public static $rules = [
        'nom' => 'required|string|max:255|unique:sujets',
        'description' => 'required|string'
    ];

    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    public static function getValidation(Array $inputs)
    {
        $validator = Validator::make($inputs, self::$rules);

        $validator->after(function ($validator) use ($inputs)
        {

        });

        return $validator;
    }

    public static function createOne(array $values)
    {
        $new = new self();

        $new->nom = $values['nom'];
        $new->description = $values['description'];

        $new->save();

        return $new;
    }

    public static function getModifyValidation($sujet, $inputs)
    {
        if(!$inputs['nom'] == $sujet['nom'])
        {
            $validator = Validator::make($inputs, self::$rules);
        }
        else
        {
            $validator = Validator::make($inputs, ['description' => 'required|string']);
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
