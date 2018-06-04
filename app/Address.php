<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = true;


    protected $fillable = [
        'ligne1',
        'ligne2',
        'ligne3',
        'ville',
        'npa'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}

