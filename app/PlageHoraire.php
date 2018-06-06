<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlageHoraire extends Model
{
    use SoftDeletes;

    protected $table = 'plages_horaires';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $rules = [

    ];

    public function plage_unique()
    {
        return $this->hasOne('\App\PlageUnique');
    }

    public function plage_horaire_repetitive()
    {
        return $this->hasOne('\App\PlageRepetive');
    }
}
