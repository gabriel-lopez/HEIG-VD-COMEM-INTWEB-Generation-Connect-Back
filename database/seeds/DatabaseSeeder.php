<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user1 = new \App\User([
            'prenom' => "Charles-Auguste",
            'nom' => "Beauverd",
            'email' => "user1@example.com",
            'telephone' => PhoneNumber::make('0245577600')->ofCountry('CH'),
            'adresse_habitation_id' => '0',
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
