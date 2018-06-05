<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'status'
    ];

    protected $rules = [
        'status' => 'required|in:"actif","inactif"',
        'role' => ''
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
}
