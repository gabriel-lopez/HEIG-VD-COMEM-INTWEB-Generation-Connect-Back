<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationService extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'commentaire',
        'noteSmiley',
    ];

    protected $rules = [
        'commentaire' => 'required|text|min:255',
        'noteSmiley' => 'required|enum:0,1,2,3',
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function senior()
    {
        return $this->belongsTo("\App\Senior");
    }

    public function intervention()
    {
        return $this->belongsTo("\App\Intervention");
    }
}
