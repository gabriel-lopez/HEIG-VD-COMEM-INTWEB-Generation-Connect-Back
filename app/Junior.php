<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class Junior extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    public $primaryKey = 'user_id';

    protected $rules = [
        'user_id' => 'required|exists:users,id',
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

    /**
     * Enregistre en base de données un nouveau Junior selon les $values donnés
     * @param array $values
     */
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
}
