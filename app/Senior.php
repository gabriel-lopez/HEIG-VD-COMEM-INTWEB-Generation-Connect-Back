<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Senior extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'preference'
    ];

    protected $rules = [
        'preference' => 'required|in:"email","telephone"',
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

    public function forfait()
    {
        return $this->hasOne('App\Forfait');
    }
}
