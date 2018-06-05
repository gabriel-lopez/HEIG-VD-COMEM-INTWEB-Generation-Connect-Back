<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'nom',
        'contenu',
    ];

    protected $rules = [
        'nom' => 'required|string|min:1|max:255',
        'contenu' => 'required|string|min:1'
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

    public function employe()
    {
        return $this->belongsTo('\App\Employe');
    }
}
