<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forfait extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'nom',
        'description',
        'prix'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'prix' => 'required|numeric|',
    ];

    public function senior()
    {
        return $this->hasMany("\App\Senior");
    }

}
