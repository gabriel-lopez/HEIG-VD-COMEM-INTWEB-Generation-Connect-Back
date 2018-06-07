<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class Employe extends Model
{
    use SoftDeletes, HasRolesAndAbilities;

    public $timestamps = true;

    protected $rules = [
        'status' => 'required|in:"actif","inactif"',
        'role' => ''
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
}
