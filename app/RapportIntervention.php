<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RapportIntervention extends Model
{
    use SoftDeletes;

    protected $table = 'rapports_interventions';

    protected $rules = [
        'servicerendu'=>'required|boolean',
        'commentaire' =>'nullable|string',
        'tempspasse' => 'required|date',// format hh:mm ?
        'fin' => 'required|date',
        'debut' =>'required|date',
        'noteSmiley' => 'required|integer|min:0|max:4',
        'intervention_id' => 'required|exists:interventions,id'

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'fin',
        'debut',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function intervention()
    {
        return $this->hasOne('\App\Intervention');
    }
}
