<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class EvaluationService extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    public static $rules = [
        'senior_id' => 'required|exists:seniors,user_id',
        'commentaire' => 'required|text|min:255',
        'noteSmiley' => 'required|enum:0,1,2,3',
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
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

    public static function createOne(array $values)
    {
        $new = new self();

        $new->senior_id = $values['senior_id'];
        $new->commentaire = $values['commentaire'];
        $new->noteSmiley = $values['noteSmiley'];

        $new->save();

        return $new;
    }

    public function senior()
    {
        return $this->hasOne("\App\Senior", 'user_id');
    }

    public function user()
    {
        return $this->belongsTo("\App\User" , 'senior_id');
    }

    public function intervention()
    {
        return $this->belongsTo("\App\Intervention");
    }
}
