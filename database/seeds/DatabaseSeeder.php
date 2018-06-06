<?php

use Illuminate\Database\Seeder;

use Propaganistas\LaravelPhone\PhoneNumber;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $address1 = new \App\Address([
            'ligne1' => "Avenue des Sports 20",
            'ligne2'=> "",
            'ligne3'=> "",
            'ville'=> "Yverdon-les-Bains",
            'npa' => "1401",
            'pays' => "Suisse",
        ]);

        $address1->save();

        $user1 = new \App\User([
            'prenom' => "Charles-Auguste",
            'nom' => "Beauverd",
            'email' => "user1@example.com",
            'telephone' => PhoneNumber::make('0245577600')->ofCountry('CH'),
            'adresse_habitation_id' => $address1->id,
            'motdepasse' => bcrypt("user1"),
            'remember_token' => str_random(10),
        ]);

        $user1->save();

        $senior1 = new \App\Senior([
            'user_id' => $user1->id,
            "preference" => "email",
        ]);

        $senior1->save();

        $user2 = new \App\User([
            'prenom' => "Gabriel",
            'nom' => "Lopez",
            'email' => "user2@example.com",
            'telephone' => PhoneNumber::make('0245577600')->ofCountry('CH'),
            'adresse_habitation_id' => $address1->id,
            'motdepasse' => bcrypt("user2"),
            'remember_token' => str_random(10),
        ]);

        $user2->save();

        $junior1 = new \App\Junior([
            'user_id' => $user2->id,
            'status' => "actif",
            'LimiteTempsTransport' => '120',
            'NoAVS' => '756.1234.5678.97',
            'BanqueNom' => 'UBS Group AG',
            'BanqueBIC' => 'UBSWCHZH80A',
            'BanqueIBAN' => 'CH08 0029 8999 9999 9999 Q',
            'AdresseDeDepart' => $address1->id,
            'AdresseFacturation' => $address1->id
        ]);

        $junior1->save();
    }
}
