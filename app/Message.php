<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $rules = [
        'email' => 'required|email',
        'contenu' => 'required|text',
    ];

    public function user()
    {
        return $this->belongsTo('\App\User','employe_id');
    }
}
