<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Address extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $attributes = [
        'pays' => 'CH'

    ];

    protected static $rules = [
        'ligne1' => 'required|string|max:255',
        'ligne2' => 'nullable|string|max:255',
        'ligne3' => 'nullable|string|max:255',
        'ville'  => 'nullable|string|max:255',
        'npa'   => 'integer|max:9700|min:1000',
    ];

    protected $hidden = [
        'pays',
        'created_at',
        'updated_at',
        'deleted_at'
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

        $new->ligne1 = $inputs['ligne1'];
        $new->ligne2 = $inputs['ligne2'];
        $new->ligne3 = $inputs['ligne3'];
        $new->ville = $inputs['ville'];
        $new->npa = $inputs['npa'];

        $new->save();

        return $new;
    }
}
