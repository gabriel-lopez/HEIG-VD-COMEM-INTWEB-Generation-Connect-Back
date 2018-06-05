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
        'pays',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static $rules = [
        'ligne1' => 'required|string|max:255',
        'ligne2' => 'nullable|string|max:255',
        'ligne3' => 'nullable|string|max:255',
        'ville'  => 'nullable|string|max:255',
        'npa'   => 'integer|max:9700|min:1000',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'adresseHabitationId');
    }

    public function juniorFacturation()
    {
        return $this->belongsTo('App\Junior', 'AdresseDeFacturation');
    }

    public function juniorDepart()
    {
        return $this->belongsTo('App\Junior', 'AdresseDeDepart');
    }
}
