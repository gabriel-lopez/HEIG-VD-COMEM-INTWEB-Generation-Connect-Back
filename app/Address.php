<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Address extends Model
{
    public $timestamps = true;

    protected $attributes = [
        'pays' => 'CH'

    ];
    protected $fillable = [
        'ligne1',
        'ligne2',
        'ligne3',
        'ville',
        'npa'
    ];

    protected $hidden = [
        'pays',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected static $rules = [
        'ligne1' => 'required|string|max:255',
        'ligne2' => 'nullable|string|max:255',
        'ligne3' => 'nullable|string|max:255',
        'ville'  => 'nullable|string|max:255',
        'npa'   => 'integer|max:9700|min:1000',
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
        $new->ligne1 = $inputs['ligne1'];
        $new->ligne2 = $inputs['ligne2'];
        $new->ligne3 = $inputs['ligne3'];
        $new->ville = $inputs['ville'];
        $new->npa = $inputs['npa'];
        $new->save();
        return $new;
    }
}
