<?php

use App\Junior;
use App\Page;
use App\Senior;
use Illuminate\Database\Seeder;

use Silber\Bouncer\BouncerFacade as Bouncer;

class BouncerSeeder extends Seeder
{
    public function run()
    {
        //<editor-fold desc="Roles">
        $superadmin = Bouncer::role()->create([
            'name' => 'superadmin',
            'title' => 'Super Administrateur',
        ]);

        $directeur = Bouncer::role()->create([
            'name' => 'directeur',
            'title' => 'Directeur',
        ]);

        $formateur = Bouncer::role()->create([
            'name' => 'formateur',
            'title' => 'Formateur',
        ]);

        $secretariat = Bouncer::role()->create([
            'name' => 'secretariat',
            'title' => 'Secrétariat',
        ]);

        $rh = Bouncer::role()->create([
            'name' => 'rh',
            'title' => 'Ressources Humaines',
        ]);

        $junior = Bouncer::role()->create([
            'name' => 'junior',
            'title' => 'Junior',
        ]);

        $senior = Bouncer::role()->create([
            'name' => 'senior',
            'title' => 'Senior',
        ]);
        //</editor-fold>

        $voir_junior = Bouncer::ability()->create([
            'name' => 'voir-junior',
            'title' => 'Voir Junior',
        ]);

        $voir_liste_juniors = Bouncer::ability()->create([
            'name' => 'voir-liste-juniors',
            'title' => 'Voir la liste des juniors',
        ]);

        $voir_senior = Bouncer::ability()->create([
            'name' => 'voir-senior',
            'title' => 'Voir Senior',
        ]);

        $voir_liste_seniors = Bouncer::ability()->create([
            'name' => 'voir-liste-seniors',
            'title' => 'Voir la liste des seniors',
        ]);

        $voir_employe = Bouncer::ability()->create([
            'name' => 'voir-employe',
            'title' => 'Voir Employé',
        ]);

        $creer_senior = Bouncer::ability()->create([
            'name' => 'creer-senior',
            'title' => 'Créer un Senior',
        ]);

        $creer_junior = Bouncer::ability()->create([
            'name' => 'creer-junior',
            'title' => 'Créer un Junior',
        ]);

        $creer_employe = Bouncer::ability()->create([
            'name' => 'create-employe',
            'title' => 'create-employe',
        ]);

        $modifier_senior = Bouncer::ability()->create([
            'name' => 'modifier-senior',
            'title' => 'modifier-senior',
        ]);

        $modifier_junior = Bouncer::ability()->create([
            'name' => 'modifier-junior',
            'title' => 'modifier-junior',
        ]);

        $modifier_employe = Bouncer::ability()->create([
            'name' => 'modifier-employe',
            'title' => 'Modifier Employé',
        ]);

        $supprimer_senior = Bouncer::ability()->create([
            'name' => 'supprimer-senior',
            'title' => 'Supprimer Senior',
        ]);

        $supprimer_junior = Bouncer::ability()->create([
            'name' => 'modifier-junior',
            'title' => 'Modifier Junior',
        ]);

        $supprimer_employe = Bouncer::ability()->create([
            'name' => 'supprimer-employe',
            'title' => 'Supprimer Employé',
        ]);

        $create_intervention = Bouncer::ability()->create([
            'name' => 'create_intervention',
            'title' => 'create_intervention',
        ]);

        $modifier_contenu_page = Bouncer::ability()->create([
            'name' => 'modifier_contenu_page',
            'title' => 'modifier_contenu_page',
        ]);

        $voir_candidatures = Bouncer::ability()->create([
            'name' => 'voir-candidatures',
            'title' => 'Voir les candidatures',
        ]);

        $modifier_candidature = Bouncer::ability()->create([
            'name' => 'modifier-candidatures',
            'title' => 'Modifier les candidatures',
        ]);

        $voir_liste_formations = Bouncer::ability()->create([
            'name' => 'voir-liste-formations',
            'title' => 'Voir les formations',
        ]);

        $creer_formation = Bouncer::ability()->create([
            'name' => 'creer-formation',
            'title' => 'Créer une formation',
        ]);

        $modifier_formation = Bouncer::ability()->create([
            'name' => 'modifier-formation',
            'title' => 'Modifier une formation',
        ]);

        $supprimer_formation = Bouncer::ability()->create([
            'name' => 'supprimer-formation',
            'title' => 'Supprimer une formation',
        ]);

        $exporter_donnees = Bouncer::ability()->create([
            'name' => 'exporter-donnees',
            'title' => 'exporter_donnees',
        ]);

        $voir_evalutions = Bouncer::ability()->create([
            'name' => 'voir-evalutions',
            'title' => 'Voir les évaluations',
        ]);

        $creer_evalution = Bouncer::ability()->create([
            'name' => 'creer-evalution',
            'title' => 'Créer une évaluation',
        ]);

        $creer_sujet = Bouncer::ability()->create([
            'name' => 'creer-sujet',
            'title' => 'Créer un sujet',
        ]);

        $creer_sujet = Bouncer::ability()->create([
            'name' => 'modifier-sujet',
            'title' => 'Modifier un sujet',
        ]);

        $creer_matiere = Bouncer::ability()->create([
            'name' => 'creer-matiere',
            'title' => 'Créer une matière',
        ]);

        $creer_requete = Bouncer::ability()->create([
            'name' => 'creer-requete',
            'title' => 'Créer une requête',
        ]);

        $voir_requete = Bouncer::ability()->create([
            'name' => 'voir-requete',
            'title' => 'Voir une requête',
        ]);

        Bouncer::allow($superadmin)->everything();

        Bouncer::allow($directeur)->to($creer_employe);
        Bouncer::allow($directeur)->to($creer_junior);
        Bouncer::allow($directeur)->to($creer_employe);

        Bouncer::allow($secretariat)->to($creer_senior);
        Bouncer::allow($secretariat)->to($creer_requete);
        Bouncer::allow($secretariat)->to($create_intervention);
        Bouncer::allow($secretariat)->to($modifier_contenu_page);

        Bouncer::allow($rh)->to($voir_candidatures);
        Bouncer::allow($rh)->to($modifier_candidature);
        Bouncer::allow($rh)->to($modifier_candidature);

        Bouncer::allow($junior)->to($voir_junior);
        Bouncer::allow($junior)->to($modifier_junior);
        //Bouncer::allow($senior)->to($);

        Bouncer::allow($senior)->to($voir_senior);
        Bouncer::allow($senior)->to($modifier_senior);
        Bouncer::allow($senior)->to($creer_requete);
        Bouncer::allow($senior)->to($creer_evalution);
    }
}
