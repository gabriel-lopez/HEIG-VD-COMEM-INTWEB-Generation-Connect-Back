<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReponseType extends Model
{
    protected $fillable = [
        'objet',
        'contenu'
    ];

    protected $rules = [
        'objet' => 'required|string|max:255',
        'contenu' => 'required|text'
    ];

    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];
}
