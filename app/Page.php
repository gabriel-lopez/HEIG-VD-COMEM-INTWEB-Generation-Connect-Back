<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $timestamps = true;

    protected $rules = [
        'nom' => 'required|string|min:1|max:255|unique:pages',
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

    public function employe()
    {
        return $this->belongsTo('\App\Employe');
    }
}
