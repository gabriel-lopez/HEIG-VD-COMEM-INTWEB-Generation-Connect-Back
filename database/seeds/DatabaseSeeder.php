<?php

use Illuminate\Database\Seeder;

use Propaganistas\LaravelPhone\PhoneNumber;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(BouncerSeeder::class);

        //<editor-fold desc="Sujets">
        $sujet1 = new \App\Sujet([
            'nom' => "Sujet #1",
            'description' => "Sujet #1 Description",
        ]);

        $sujet1->save();

        $sujet2 = new \App\Sujet([
            'nom' => "Sujet #2",
            'description' => "Sujet #2 Description",
        ]);

        $sujet2->save();
        //</editor-fold>

        //<editor-fold desc="Matieres">
        $matiere1 = new \App\Matiere([
            'nom' => "Sujet #1",
            'description' => "Sujet #1 Description",
            'sujet_id' => $sujet1->id
        ]);

        $matiere1->save();

        $matiere2 = new \App\Matiere([
            'nom' => "Sujet #1",
            'description' => "Sujet #1 Description",
            'sujet_id' => $sujet2->id
        ]);

        $matiere2->save();
        //</editor-fold>

        //<editor-fold desc="Forfaits">
        $forfait1 = new \App\Forfait([
            'nom' => "Forfait #1",
            'description' => "Forfait #1 Description",
            'prix' => "19.99"
        ]);

        $forfait1->save();

        $forfait2 = new \App\Forfait([
            'nom' => "Forfait #2",
            'description' => "Forfait #2 Description",
            'prix' => "29.99"
        ]);

        $forfait2->save();

        $forfait3 = new \App\Forfait([
            'nom' => "Forfait #3",
            'description' => "Forfait #3 Description",
            'prix' => "39.99"
        ]);

        $forfait3->save();
        //</editor-fold>

        //<editor-fold desc="Adresses">
        $address1 = new \App\Address([
            'ligne1' => "Avenue des Sports 20",
            'ligne2' => "",
            'ligne3' => "",
            'ville' => "Yverdon-les-Bains",
            'npa' => "1401",
            'pays' => "Suisse",
        ]);

        $address1->save();
        //</editor-fold>

        //<editor-fold desc="Utilisateurs">
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

        $user3 = new \App\User([
            'prenom' => "Etienne",
            'nom' => "Rallu",
            'email' => "user3@example.com",
            'telephone' => PhoneNumber::make('0245577600')->ofCountry('CH'),
            'adresse_habitation_id' => $address1->id,
            'motdepasse' => bcrypt("user3"),
            'remember_token' => str_random(10),
        ]);

        $user3->save();
        //</editor-fold>

        //<editor-fold desc="Seniors">
        $senior1 = new \App\Senior([
            'user_id' => $user1->id,
            'preference' => "email",
            'forfait_id' => $forfait1->id
        ]);

        $senior1->save();

        //$senior1->matieres()->save($matiere1);
        //</editor-fold>

        //<editor-fold desc="Juniors">
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

        $junior1->matieres()->save($matiere1);
        $junior1->matieres()->save($matiere2);
        //</editor-fold>

        //<editor-fold desc="Employes">
        $employe1 = new \App\Employe([
            'user_id' => $user3->id,
            'status' => "actif",
        ]);

        $employe1->save();
        //</editor-fold>

        $intervention1 = new \App\Intervention([
            'statut' => 'finalise',
            'finprevu' => Carbon::now(),
            'debutprevu' => Carbon::now()->subHour(1),
            'junior_affecte' => $junior1->id,
            'requete_id' => '0'
        ]);
        $intervention1->save();

        $evaluationService1 = new \App\EvaluationService(
            ['senior_id' => $senior1->user_id,
                'intervention_id' => $intervention1->id,
                'commentaire' => 'Super service, jeune à l\'heure, content',
                'noteSmiley' => 2]
        );
        $evaluationService1->save();


    }
}
