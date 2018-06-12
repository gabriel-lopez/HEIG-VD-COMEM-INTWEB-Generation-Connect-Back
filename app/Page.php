<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Page extends Model
{
    use SoftDeletes;

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

    public static function getValidation(Array $inputs)
    {
        $validator = Validator::make($inputs, self::$rules);

        $validator->after(function ($validator) use ($inputs)
        {
            // contraintes supplémentaires
        });

        return $validator;
    }

    public function employe()
    {
        return $this->belongsTo('\App\Employe');
    }
}
