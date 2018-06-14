<?php

use Carbon\Carbon;
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

        $irinaAdresse = new \App\Address([
            'ligne1' => "Rue de la Madeleine 17",
            'ligne2' => "",
            'ligne3' => "",
            'ville' => "Vevey",
            'npa' => "1800",
            'pays' => "Suisse",
        ]);
        $irinaAdresse->save();

        $irina = new \App\User([
            'prenom' => "Irina",
            'nom' => "Despot",
            'email' => "irina.despot@heig.vd.ch",
            'telephone' => PhoneNumber::make('0795994146')->ofCountry('CH'),
            'adresse_habitation_id' => $irinaAdresse->id,
            'motdepasse' => bcrypt("patate123"),
            'remember_token' => str_random(10),
        ]);
        $irina->save();

        $irinaJunior = new \App\Junior([
            'user_id' => $irina->id,
            'status' => "actif",
            'LimiteTempsTransport' => '120',
            'NoAVS' => '756.1234.5678.97',
            'BanqueNom' => 'UBS Group AG',
            'BanqueBIC' => 'UBSWCHZH80A',
            'BanqueIBAN' => 'CH08 0029 8999 9999 9999 Q',
            'AdresseDeDepart' => $irinaAdresse->id,
            'AdresseFacturation' => $irinaAdresse->id
        ]);
        $irinaJunior->save();

        Bouncer::assign('junior')->to($irina);

        $juanAdresse = new \App\Address([
            'ligne1' => "Rue Orient-Ville 10",
            'ligne2' => "",
            'ligne3' => "",
            'ville' => "Lausanne",
            'npa' => "1005",
            'pays' => "Suisse",
        ]);
        $juanAdresse->save();

        $juan = new \App\User([
            'prenom' => "Juan",
            'nom' => "Moreno",
            'email' => "j.j.moreno994@gmail.com",
            'telephone' => PhoneNumber::make('0795994146')->ofCountry('CH'),
            'adresse_habitation_id' => $juanAdresse->id,
            'motdepasse' => bcrypt("patate123"),
            'remember_token' => str_random(10),
        ]);
        $juan->save();

        $juanJunior = new \App\Junior([
            'user_id' => $juan->id,
            'status' => "actif",
            'LimiteTempsTransport' => '120',
            'NoAVS' => '756.1234.5678.97',
            'BanqueNom' => 'UBS Group AG',
            'BanqueBIC' => 'UBSWCHZH80A',
            'BanqueIBAN' => 'CH08 0029 8999 9999 9999 Q',
            'AdresseDeDepart' => $juanAdresse->id,
            'AdresseFacturation' => $juanAdresse->id
        ]);
        $juanJunior->save();

        Bouncer::assign('junior')->to($juan);

        $etienneAdresse = new \App\Address([
            'ligne1' => "Rue de Mossel 8",
            'ligne2' => "",
            'ligne3' => "",
            'ville' => "Granges-Marnand",
            'npa' => "1523",
            'pays' => "Suisse",
        ]);
        $etienneAdresse->save();

        $etienne = new \App\User([
            'prenom' => "Etienne",
            'nom' => "Rallu",
            'email' => "info@etiennerallu.com",
            'telephone' => PhoneNumber::make('0795994146')->ofCountry('CH'),
            'adresse_habitation_id' => $etienneAdresse->id,
            'motdepasse' => bcrypt("patate123"),
            'remember_token' => str_random(10),
        ]);
        $etienne->save();

        $etienneJunior = new \App\Junior([
            'user_id' => $etienne->id,
            'status' => "actif",
            'LimiteTempsTransport' => '120',
            'NoAVS' => '756.1234.5678.97',
            'BanqueNom' => 'UBS Group AG',
            'BanqueBIC' => 'UBSWCHZH80A',
            'BanqueIBAN' => 'CH08 0029 8999 9999 9999 Q',
            'AdresseDeDepart' => $etienneAdresse->id,
            'AdresseFacturation' => $etienneAdresse->id
        ]);
        $etienneJunior->save();

        Bouncer::assign('junior')->to($etienne);

        $gabrielAdresse = new \App\Address([
            'ligne1' => "Rue du Bugnon 55",
            'ligne2' => "",
            'ligne3' => "",
            'ville' => "Renens",
            'npa' => "1020",
            'pays' => "Suisse",
        ]);
        $gabrielAdresse->save();

        $gabriel = new \App\User([
            'prenom' => "Gabriel",
            'nom' => "Lopez",
            'email' => "ch.gabriel.lopez@outlook.com",
            'telephone' => PhoneNumber::make('0795994146')->ofCountry('CH'),
            'adresse_habitation_id' => $gabrielAdresse->id,
            'motdepasse' => bcrypt("patate123"),
            'remember_token' => str_random(10),
        ]);
        $gabriel->save();

        $gabrielJunior = new \App\Junior([
            'user_id' => $gabriel->id,
            'status' => "actif",
            'LimiteTempsTransport' => '120',
            'NoAVS' => '756.1234.5678.97',
            'BanqueNom' => 'UBS Group AG',
            'BanqueBIC' => 'UBSWCHZH80A',
            'BanqueIBAN' => 'CH08 0029 8999 9999 9999 Q',
            'AdresseDeDepart' => $gabrielAdresse->id,
            'AdresseFacturation' => $gabrielAdresse->id
        ]);
        $gabrielJunior->save();

        Bouncer::assign('junior')->to($gabriel);

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

        $requete1 = new \App\Requete([
            'type' => 'unique',
            'statut' => 'accepte',
            'matiere_id' => 1,
            'soumis_par' => $senior->id,
            'plageHoraire_id' => 1
        ]);
        $requete1->save();

        $soumission1 = new \App\Soumission([
            'requete_id' => $requete1->id,
            'junior_id' => $gabriel->id,
            'acceptation' => Carbon::now()->subHour(3),
            'proposition' => Carbon::now()->subHour(4),
        ]);
        $soumission1->save();

        $intervention1 = new \App\Intervention([
            'statut' => 'finalise',
            'finprevu' => Carbon::now(),
            'debutprevu' => Carbon::now()->subHour(1),
            'junior_affecte_id' => 5,
            'requete_id' => $requete1->id,
        ]);
        $intervention1->save();
        $requete1->interventions()->save($intervention1);

        $evaluationService1 = new \App\EvaluationService([
            'senior_id' => 1,
            'intervention_id' => $intervention1->id,
            'commentaire' => 'Super service, jeune à l\'heure, content',
            'noteSmiley' => 2]
        );
        $evaluationService1->save();
    }
}
