<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'type',
        'contenu',
    ];

    protected $rules = [
        'type' => 'required|enum:"web","sms","email"',
        'contenu' => 'required|text',
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

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
