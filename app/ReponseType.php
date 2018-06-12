<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class ReponseType extends Model
{
    use SoftDeletes;

    public $timestamps;

    public static $rules = [
        'objet' => 'required|string|max:255',
        'contenu' => 'required|text'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function getValidation($inputs)
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

        $new->objet = $inputs['objet'];
        $new->contenu = $inputs['contenu'];

        $new->save();

        return $new;
    }
}
