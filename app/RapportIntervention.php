<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RapportIntervention extends Model
{

    protected $fillable = [];

    protected $table = 'rapports_interventions';
    protected $dates = [
        'fin','debut'
    ];

    protected $rules = [
        'servicerendu'=>'required|boolean',
        'commentaire' =>'nullable|string',
        'tempspasse' => 'required|date',// format hh:mm ?
        'fin' => 'required|date',
        'debut' =>'required|date',
        'noteSmiley' => 'required|integer|min:0|max:4',
        'intervention_id' => 'required|exists:interventions,id'

    ];

public function intervention()
{
 return $this->hasOne('\App\Intervention');
}

}
