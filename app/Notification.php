<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;

class Notification extends Model
{
    public $timestamps = true;

    public static $rules = [
        'type' => 'required|enum:"web","sms","email"',
        'contenu' => 'required|text',
        'user_id' => 'required|exists:users,id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
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

    public static function createOne($user_id, $contenu, $type)
    {
        $new = new self();

        $new->type = $type;
        $new->contenu = $contenu;
        $new->user_id = $user_id;

        $new->save();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
