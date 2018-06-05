<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'email',
        'contenu'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $rules = [
        'email' => 'required|email',
        'contenu' => 'required|text',
    ];
}
