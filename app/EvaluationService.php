<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluationService extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $rules = [
        'commentaire' => 'required|text|min:255',
        'noteSmiley' => 'required|enum:0,1,2,3',
    ];

    protected $hidden = [
        'senior_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function senior()
    {
        return $this->hasOne("\App\Senior", 'user_id');
    }

    public function user()
    {
        return $this->belongsTo("\App\User" , 'senior_id');
    }

    public function intervention()
    {
        return $this->belongsTo("\App\Intervention");
    }
}
