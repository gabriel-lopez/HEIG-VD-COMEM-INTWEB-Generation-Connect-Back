<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Junior extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    public $primaryKey = 'user_id';

    public static $rules = [
        'user_id' => 'exists:users,id',
        'status' => 'required|in:"candidat","formation","actif","inactif","refuse"',
        'LimiteTempsTransport' => 'required|integer|min:0',
        'AdresseDeDepart' => 'required|exists:addresses,id',
        'AdresseFacturation' => 'required|exists:addresses,id',
        'NoAVS' => 'required|regex:(756\.?[0-9]{4}\.?[0-9]{4}\.?[0-9]{2})',
        'BanqueNom' => 'required|string|max:255',
        'BanqueBIC' => 'required|string|bic',
        'BanqueIBAN' => 'required|iban',
    ];

    protected $hidden = [
        'user_id',
        'AdresseDeDepart',
        'AdresseFacturation',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function getValidation(Array $inputs)
    {
        $validator = Validator::make($inputs, self::$rules);

        $validator->after(function ($validator) use ($inputs)
        {
            // contraintes supplémentaires
        });

        return $validator;
    }

    public static function createOne(array $values)
    {
        $new = new self();

        $new->user_id = $values['user_id'];
        $new->status = $values['status'];
        $new->LimiteTempsTransport = $values['LimiteTempsTransport'];
        $new->NoAVS = $values['NoAVS'];
        $new->BanqueNom = $values['BanqueNom'];
        $new->BanqueBIC = $values['BanqueBIC'];
        $new->BanqueIBAN = $values['BanqueIBAN'];

        $new->AdresseDeDepart = $values['AdresseDeDepart'];
        $new->AdresseFacturation = $values['AdresseFacturation'];

        $new->save();
    }

    public function adresse_de_depart()
    {
        return $this->belongsTo('\App\Address', 'AdresseDeDepart');
    }

    public function adresse_de_facturation()
    {
        return $this->belongsTo('\App\Address', 'AdresseFacturation');
    }

    public function matieres()
    {
        return $this->belongsToMany('\App\Matiere');
    }

    public function plageshoraires()
    {
        return $this->belongsToMany('\App\PlageHoraire');
    }
}
