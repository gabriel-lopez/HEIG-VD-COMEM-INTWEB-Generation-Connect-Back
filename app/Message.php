<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Message extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    public static $rules = [
        'email' => 'required|email',
        'contenu' => 'required|text',
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

        $new->email = $inputs['email'];
        $new->contenu = $inputs['contenu'];

        $new->save();

        return $new;
    }

    public function user()
    {
        return $this->belongsTo('\App\User','employe_id');
    }
}
