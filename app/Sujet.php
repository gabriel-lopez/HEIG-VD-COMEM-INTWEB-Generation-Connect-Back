<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    protected $fillable = [
        'nom',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $rules = [
        'nom' => 'required|string|max:255',
        'description' => 'required|string'
    ];

    public function matieres()
    {
        return $this->hasMany('\App\Matiere');
    }
}
