<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forfait extends Model
{
    protected $fillable = [
        'nom', 'description', 'prix'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];


    public $timestamps = true;

    public function usesTimestamps()
    {
        return true;
    }


}
