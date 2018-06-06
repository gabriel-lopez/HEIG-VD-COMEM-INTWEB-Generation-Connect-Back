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
            'id' => $user1->id,
            "preference" => "email",
        ]);

        $senior1->save();
    }
}
