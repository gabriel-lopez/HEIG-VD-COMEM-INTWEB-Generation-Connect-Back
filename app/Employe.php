<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class Employe extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    public $primaryKey = "user_id";

    public static $rules = [
        'user_id' => 'required|exists:users,used_id',
        'status' => 'required|in:"actif","inactif"',
    ];

    protected $hidden = [
        'user_id',
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

    public static function createOne(array $values)
    {
        $new = new self();

        $new->user_id = $values['user_id'];
        $new->status = $values['status'];

        $new->save();
    }
}
