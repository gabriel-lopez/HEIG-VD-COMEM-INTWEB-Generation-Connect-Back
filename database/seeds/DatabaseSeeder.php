<?php

use Illuminate\Database\Seeder;

use Propaganistas\LaravelPhone\PhoneNumber;
use Carbon\Carbon;
use Silber\Bouncer\BouncerFacade as Bouncer;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(BouncerSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(UsersWithAbilitiesSeeder::class);

        //<editor-fold desc="Sujets">
        $sujet1 = new \App\Sujet([
            'nom' => "Informatique",
            'description' => "Sujet #1 Description",
        ]);

        $sujet1->save();

        $sujet2 = new \App\Sujet([
            'nom' => "Jardinage",
            'description' => "Sujet #2 Description",
        ]);

        $sujet2->save();
        //</editor-fold>

        //<editor-fold desc="Matieres">
        $matiere1 = new \App\Matiere([
            'nom' => "Skype",
            'description' => "Papy telephone maison",
            'sujet_id' => $sujet1->id
        ]);

        $matiere1->save();

        $matiere2 = new \App\Matiere([
            'nom' => "Cueillette",
            'description' => "Aller cueillir des fraises ou des champignons",
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
        Bouncer::assign("senior")->to($user1);

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

        $user4 = new \App\User([
            'prenom' => "Arthur",
            'nom' => "Verdon",
            'email' => "user4@example.com",
            'telephone' => PhoneNumber::make('0245577600')->ofCountry('CH'),
            'adresse_habitation_id' => $address1->id,
            'motdepasse' => bcrypt("user4"),
            'remember_token' => str_random(10),
        ]);

        $user4->save();

        $user5 = new \App\User([
            'prenom' => "Alex",
            'nom' => "Shams",
            'email' => "user5@example.com",
            'telephone' => PhoneNumber::make('0245577600')->ofCountry('CH'),
            'adresse_habitation_id' => $address1->id,
            'motdepasse' => bcrypt("user5"),
            'remember_token' => str_random(10),
        ]);

        $user5->save();

        Bouncer::assign('superadmin')->to($user3);
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

        $junior2 = new \App\Junior([
            'user_id' => $user4->id,
            'status' => "actif",
            'LimiteTempsTransport' => '80',
            'NoAVS' => '756.1234.5678.97',
            'BanqueNom' => 'UBS Group AG',
            'BanqueBIC' => 'UBSWCHZH80A',
            'BanqueIBAN' => 'CH08 0029 8999 9999 9999 Q',
            'AdresseDeDepart' => $address1->id,
            'AdresseFacturation' => $address1->id
        ]);

        $junior2->save();

        $junior2->matieres()->save($matiere2);

        $junior3 = new \App\Junior([
            'user_id' => $user5->id,
            'status' => "actif",
            'LimiteTempsTransport' => '10',
            'NoAVS' => '756.1234.5678.97',
            'BanqueNom' => 'UBS Group AG',
            'BanqueBIC' => 'UBSWCHZH80A',
            'BanqueIBAN' => 'CH08 0029 8999 9999 9999 Q',
            'AdresseDeDepart' => $address1->id,
            'AdresseFacturation' => $address1->id
        ]);

        $junior3->save();

        $junior3->matieres()->save($matiere1);
        //</editor-fold>

        //<editor-fold desc="Employes">
        $employe1 = new \App\Employe([
            'user_id' => $user3->id,
            'status' => "actif",
        ]);

        $employe1->save();
        //</editor-fold>

        $plageHoraire1 = new \App\PlageHoraire([
            'joursemaine' => 'lundi',
            'heuredebut' => Carbon::createFromTime(14,00),
            'heurefin' => Carbon::createFromTime(15,00),

        ]);
        $plageHoraire1->save();


        $plageHoraire2 = new \App\PlageHoraire([
            'joursemaine' => 'lundi',
            'heuredebut' => Carbon::createFromTime(14,00),
            'heurefin' => Carbon::createFromTime(15,00),

        ]);
        $plageHoraire2->save();

        $plageUnique1 = new \App\PlageUnique([
            'plage_horaire_id' => $plageHoraire1->id,
            'date' => Carbon::now(),
        ]);
        $plageUnique1->save();


        $plageRepetitive1 = new \App\PlageRepetitive([
            'plage_horaire_id' => $plageHoraire2->id,
            'datedebut' => Carbon::now(),
            'datefin' => Carbon::now()->addDays(30),
            'nombreoccurence' => 3
        ]);
        $plageRepetitive1->save();

        $formation1 = new \App\Formation([
            'nom' => 'formation initiale',
            'description' => 'Cette formation doit être suivie par tous les juniors',
            'plagehoraire_id' => $plageUnique1->plage_horaire_id,
        ]);
        $formation1->save();
        $formation1->users()->save($user2);

        /*$rapportIntervention1 = new \App\RapportIntervention([

            'servicerendu' => true,
            'commentaire' => 'On adore les rapports d\'intervention',
            'tempspasse' => Carbon::createFromTime('2','30'),
            'fin' => Carbon::now(),
            'debut' => Carbon::now()->subHour(2)->subMinute(30),
            'noteSmiley' => 3,
            'intervention_id' => $intervention1->id,
            'user_id' => $user2->id]
            );
        $rapportIntervention1->save();*/

        $message1 = new \App\Message([
            'email' => 'prospet@envoieunmessage.com',
            'status' =>'nontraite',
            'contenu'=> 'Bonjour, je souhaite avoir des informations sur vos services',
            'employe_id' => null,
        ]);
        $message1->save();


        $message2 = new \App\Message([
            'email' => 'prospet2@envoieunmessage.com',
            'status' =>'traite',
            'contenu'=> 'Bonjour, je souhaite avoir des informations sur vos services',
            'employe_id' => $user3->id,
        ]);
        $message2->save();

        $notification1 = new \App\Notification([
            'type' => 'email',
            'contenu' => 'ceci est une notification',
            'user_id' => $user1->id,
            ]);
        $notification1->save();

        $junior1->plageshoraires()->save($plageHoraire1);
    }
}
