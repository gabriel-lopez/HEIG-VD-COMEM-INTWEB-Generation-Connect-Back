<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Propaganistas\LaravelPhone\PhoneNumber;
class UsersWithAbilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
         * junior@etiennerallu.com
         * senior@etiennerallu.com
         * senior@etiennerallu.com
         *
         * Hamdan Yasmine <yasmine.hamdan@heig-vd.ch>,
         * Irina Despot <irinadespot@gmail.com>,
         * Lopez Gabriel <gabriel.lopez@heig-vd.ch>,
         * Moreno Izquierdo Juan José <juan.morenoizquierdo@heig-vd.ch>,
         * Philipona Claude <Claude.Philipona@heig-vd.ch>
         */


        $juniorAdresse = new \App\Address([
            'ligne1' => "Avenue Louis-Ruchonnet 2",
            'ligne2' => "",
            'ligne3' => "",
            'ville' => "Lausanne",
            'npa' => "1003",
            'pays' => "Suisse",
        ]);
        $juniorAdresse->save();


        $junior = new \App\User([
            'prenom' => "Junior",
            'nom' => "Wolf",
            'email' => "junior@etiennerallu.com",
            'telephone' => PhoneNumber::make('0795994146')->ofCountry('CH'),
            'adresse_habitation_id' => $juniorAdresse->id,
            'motdepasse' => bcrypt("patate123"),
            'remember_token' => str_random(10),
        ]);
        $junior->save();

        $junior1 = new \App\Junior([
            'user_id' => $junior->id,
            'status' => "actif",
            'LimiteTempsTransport' => '120',
            'NoAVS' => '756.1234.5678.97',
            'BanqueNom' => 'UBS Group AG',
            'BanqueBIC' => 'UBSWCHZH80A',
            'BanqueIBAN' => 'CH08 0029 8999 9999 9999 Q',
            'AdresseDeDepart' => $juniorAdresse->id,
            'AdresseFacturation' => $juniorAdresse->id
        ]);
        $junior1->save();

        Bouncer::assign('junior')->to($junior);

 //Senior
        $seniorAdresse = new \App\Address([
            'ligne1' => "Rue du Rôtillon 24",
            'ligne2' => "",
            'ligne3' => "",
            'ville' => "Lausanne",
            'npa' => "1003",
            'pays' => "Suisse",
        ]);
        $seniorAdresse->save();

        $senior = new \App\User([
            'prenom' => "Emmé",
            'nom' => "Jacquet",
            'email' => "senior@etiennerallu.com",
            'telephone' => PhoneNumber::make('0266683029')->ofCountry('CH'),
            'adresse_habitation_id' => $seniorAdresse->id,
            'motdepasse' => bcrypt("patate123"),
            'remember_token' => str_random(10),
        ]);
        $senior->save();

        $senior1 = new \App\Senior([
            'user_id' => $senior->id,
            'preference' => "email",
            'forfait_id' => 1
        ]);
        $senior1->save();

        Bouncer::assign('senior')->to($senior);

// Secretaire


        $danielaAdresse = new \App\Address([
            'ligne1' => "Avenue des Sports",
            'ligne2' => "",
            'ligne3' => "",
            'ville' => "Yverdon-Les-Bains",
            'npa' => "1400",
            'pays' => "Suisse",
        ]);
        $danielaAdresse->save();


        $daniela = new \App\User([
            'prenom' => "Daniela",
            'nom' => "Ober",
            'email' => "secretariat@etiennerallu.com",
            'telephone' => PhoneNumber::make('0245577600')->ofCountry('CH'),
            'adresse_habitation_id' => $danielaAdresse->id,
            'motdepasse' => bcrypt("patate123"),
            'remember_token' => str_random(10),
        ]);
        $daniela->save();


        $employe1 = new \App\Employe([
            'user_id' => $daniela->id,
            'status' => "actif",
        ]);
        $employe1->save();

        Bouncer::assign('secretariat')->to($daniela);


// RH
        $rhAdresse = new \App\Address([
            'ligne1' => "Route du crêt 6",
            'ligne2' => "",
            'ligne3' => "",
            'ville' => "Montagny-près-Yverdon",
            'npa' => "1440",
            'pays' => "Suisse",
        ]);
        $rhAdresse->save();


        $rh = new \App\User([
            'prenom' => "Pierre",
            'nom' => "Berger",
            'email' => "rh@etiennerallu.com",
            'telephone' => PhoneNumber::make('0245577600')->ofCountry('CH'),
            'adresse_habitation_id' => $rhAdresse->id,
            'motdepasse' => bcrypt("patate123"),
            'remember_token' => str_random(10),
        ]);
        $rh->save();

        $rhemploye = new \App\Employe([
            'user_id' => $rh->id,
            'status' => "actif",
        ]);
        $rhemploye->save();

        Bouncer::assign('rh')->to($rh);

 // Formateur formateur@etiennerallu.com
        $formateurAdresse = new \App\Address([
            'ligne1' => "Rue Saint-Georges 72",
            'ligne2' => "",
            'ligne3' => "",
            'ville' => "Yverdon-les-Bains",
            'npa' => "1400",
            'pays' => "Suisse",
        ]);
        $formateurAdresse->save();


        $formateur = new \App\User([
            'prenom' => "Pierre",
            'nom' => "Berger",
            'email' => "formateur@etiennerallu.com",
            'telephone' => PhoneNumber::make('0245577600')->ofCountry('CH'),
            'adresse_habitation_id' => $formateurAdresse->id,
            'motdepasse' => bcrypt("patate123"),
            'remember_token' => str_random(10),
        ]);
        $formateur->save();

        $formateuremploye = new \App\Employe([
            'user_id' => $formateur->id,
            'status' => "actif",
        ]);
        $formateuremploye->save();

        Bouncer::assign('formateur')->to($formateur);

// Directeur direction@etiennerallu.com

        $directeurAdresse = new \App\Address([
            'ligne1' => "Point du jour",
            'ligne2' => "",
            'ligne3' => "",
            'ville' => "Vevey",
            'npa' => "1800",
            'pays' => "Suisse",
        ]);
        $directeurAdresse->save();


        $directeur = new \App\User([
            'prenom' => "Paul",
            'nom' => "Itique",
            'email' => "direction@etiennerallu.com",
            'telephone' => PhoneNumber::make('0245577600')->ofCountry('CH'),
            'adresse_habitation_id' => $directeurAdresse->id,
            'motdepasse' => bcrypt("patate123"),
            'remember_token' => str_random(10),
        ]);
        $directeur->save();

        $directeurEmploye = new \App\Employe([
            'user_id' => $directeur->id,
            'status' => "actif",
        ]);
        $directeurEmploye->save();

        Bouncer::assign('superadmin')->to($directeur);


    // Ajout de matières

        $matiere1 = new \App\Matiere([
            'nom' => "Word",
            'description' => "Logiciel bureautique",
            'sujet_id' => 1
        ]);
        $matiere1->save();

        $matiere2 = new \App\Matiere([
            'nom' => "Excel",
            'description' => "Logiciel de calcul de Microsoft",
            'sujet_id' => 1
        ]);
        $matiere2->save();

        $matiere3 = new \App\Matiere([
            'nom' => "Internet",
            'description' => "Navigation sur internet, recherche d'information",
            'sujet_id' => 1
        ]);
        $matiere3->save();

        $matiere4 = new \App\Matiere([
            'nom' => "e-mail",
            'description' => "Consulter et écrire des e-mails",
            'sujet_id' => 1
        ]);
        $matiere4->save();

        $matiere5 = new \App\Matiere([
            'nom' => "photographie numérique",
            'description' => "Consulter ses photographies numériques, les transférer sur son ordiinateur, les modifier...",
            'sujet_id' => 1
        ]);
        $matiere5->save();

        $matiere6 = new \App\Matiere([
            'nom' => "Youtube",
            'description' => "Regarder des vidéos de chats du monde entier",
            'sujet_id' => 1
        ]);
        $matiere6->save();

        $matiere7 = new \App\Matiere([
            'nom' => "Netflix",
            'description' => "Regarder des films en ligne",
            'sujet_id' => 1
        ]);
        $matiere7->save();

        $matiere8 = new \App\Matiere([
            'nom' => "Cartes",
            'description' => "Calculer des itinéraires grâce à Google Maps ou d'autres services de cartographie",
            'sujet_id' => 1
        ]);
        $matiere8->save();

        $junior1->matieres()->save($matiere1);
        $junior1->matieres()->save($matiere2);
        $junior1->matieres()->save($matiere3);
        $junior1->matieres()->save($matiere4);
        $junior1->matieres()->save($matiere5);
        $junior1->matieres()->save($matiere6);
        $junior1->matieres()->save($matiere7);
        $junior1->matieres()->save($matiere8);



    }


}
