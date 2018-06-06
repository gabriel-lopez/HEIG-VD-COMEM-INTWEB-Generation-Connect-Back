<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Junior extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'status',
        'LimiteTempsTransport',
        'AdresseDepart',
        'AdresseFacturation',
        'NoAVS',
        'BanqueNom',
        'BanqueBIC',
        'BanqueIBAN',
    ];

    protected $rules = [
        'status' => 'required|in:"candidat","formation","actif","inactif","refuse"',
        'LimiteTempsTransport' => 'required|integer|min:0',
        'AdresseDeDepart' => 'required|exists:addresses,id',
        'AdresseFacturation' => 'required|exists:addresses,id',
        'NoAVS' => 'required|regex:756\.?[0-9]{4}\.?[0-9]{4}\.?[0-9]{2}',
        'BanqueNom' => 'required|string|max:255',
        'BanqueBIC' => 'required|string|regex:/^[a-z]{4}[a-z]{2}[0-9a-z]{2}([0-9a-z]{3})?\z/i',
        'BanqueIBAN' => 'required|regex:756\.?[0-9]{4}\.?[0-9]{4}\.?[0-9]{2}',
    ];

    protected $hidden = [
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function AdresseDeDepart()
    {
        return $this->belongsTo('\App\Address');
    }
}
