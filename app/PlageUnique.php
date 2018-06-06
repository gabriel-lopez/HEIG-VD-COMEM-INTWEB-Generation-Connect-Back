<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlageUnique extends Model
{
    use SoftDeletes;

    protected $table = 'plages_uniques';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $rules = [

    ];

    public function plage_horaire()
    {
        return $this->belongsTo('\App\PlageHoraire');
    }
}
