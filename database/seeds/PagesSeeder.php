<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    public function run()
    {
        $page1 = new Page([
            'nom' => "accueil",
            'contenu' => "<div class=\"mt-3 px-3\">


    <div class=\"card-text-black my-5\">
        <h2>
            <p>Les Juniors au service des Seniors pour les accompagner dans ce nouveau monde de la digitalisation : informatique, téléphonie, télévision, robotisation, programmation, services en ligne.</p>
            <p>Generation Connect vous propose un service basé sur le relationnel et la sécurité : des agents juniors formés aux compétences sociales et des interventions sécurisées et suivies.</p>
        </h2>
    </div>

    <h1 class=\"text-size\"><b>Nos services</b></h1>
    <hr/>
    <div class=\"row my-4\">
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4 \" style=\"max-width: 18rem;\">
            <div class=\"card-header bg-orange \"><b class=\"mx-auto\">Installations</b></div>
            <div class=\"card-body bg-orange-trans\">
                <ul class=\"mx-auto\">
                    <li>Télévision digitale</li>
                    <li>Téléphonie digitale</li>
                    <li>Connexion Internet</li>
                    <li>Radio</li>
                    <li>PC)</li>
                    <li>Smartphones & leurs applications</li>
                    <li>Robot ménagers</li>
                    <li>Installations de sécurité)</li>
                </ul>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4 \" style=\"max-width: 18rem;\">
            <div class=\"card-header bg-gris \"><b>Mises à jour</b></div>
            <div class=\"card-body bg-gris-trans \">
                <ul class=\"mx-auto\">
                    <li>Télévision digitale</li>
                    <li>Téléphonie digitale</li>
                    <li>Connexion Internet</li>
                    <li>Radio</li>
                    <li>PC)</li>
                    <li>Smartphones & leurs applications</li>
                    <li>Robot ménagers</li>
                    <li>Installations de sécurité)</li>
                </ul>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4 \" style=\"max-width: 18rem;\">
            <div class=\"card-header bg-jaune\"><b>Utilisation</b></div>
            <div class=\"card-body bg-jaune-trans\">
                <ul class=\"mx-auto\">
                    <li>Communication par l’image</li>
                    <li>Messagerie : envoyer un document, photos</li>
                    <li>Services en ligne : faire avec, créer les comptes, mettre en place et former</li>
                    <li>Créer un album photo ou imprimer des jeux ou autres activités, imprimer des photos, etc.</li>
                </ul>
            </div>
        </div>
    </div>

    <h1 class=\"text-size\"><b>Nos prestations</b></h1>
    <hr/>
    <div class=\"row mt-4\">
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top mx-auto\" src=\"images/icone_tel.png\" alt=\"image hotline\">
            <div class=\"card-body\">
                <h5 class=\"card-title card-text-black\">Hotline</h5>
                <p class=\"card-text card-text-black\">Hotline pour nos seniors avec une assistance suivie, nécessaire, d'une visite à domicile dans les 48h.</p>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top mx-auto\" src=\"images/icone_maison.png\" alt=\"image visite maison\">
            <div class=\"card-body\">
                <h5 class=\"card-title card-text-black\">Visites à domicile</h5>
                <p class=\"card-text card-text-black\">Selon le programme de cotisation sélectionné, des visites régulières sont effectuées pas nos agents.</p>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top mx-auto\" src=\"images/icone_tools.png\" alt=\"image prestations spécialisées\">
            <div class=\"card-body\">
                <h5 class=\"card-title card-text-black\">Prestations spécialisées</h5>
                <p class=\"card-text card-text-black\">Grâce à nos nombreux partenaires, vous profiterez d'un réseau de prestataires de services spécialisés à des tarifs avantageux.</p>
            </div>
        </div>
    </div>

    <h1 class=\"text-size\"><b>Nos agents</b></h1>
    <hr/>
    <div class=\"my-4 d-inline-block\">
            <div class=media\">
            <img class=\"mr-3 img-left\" src=\"images/nosagents.jpg\" alt=\"image nos agents
            <div class=\"media-body mx-auto\">
                <h2 class=\"py-3\">Nos agents sont triés sur le volet</h2>
                <p>Nous sélectionnons nos collaborateurs afin qu’ils aient toutes les compétences tant informatiques que sociales.</p>
                <p>Les spécialistes de Di Marino Consulting ont créé une formation spécifique pour donner à nos agents les meilleurs outils.</p>
                <p>Dans les 48h suivant leur appel, l’un de nos agents sera chez notre cotisant.</p>
            </div>
        </div>
    </div>

 </div>",
            'employe_id' => 3
        ]);
        $page1->save();

        $page2 = new Page([
            'nom' => "aide",
            'contenu' => "<h1>Page d'aide</h1>
<p>À faire</p>",
            'employe_id' => 3
        ]);

        $page2->save();

        $page3 = new Page([
            'nom' => "infosJuniors",
            'contenu' => "<div class=\"mt-3 px-3\">

    <h1 class=\"text-size\"><b>Profil attendu et compétences</b></h1>
    <hr/>
    <p>Vous êtes étudiants ou apprentis et vous avez : </p>
    <div class=\"row mt-4\">
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top  mx-auto\" src=\"images/icone_tech.png\" alt=\"image technologies\">
            <div class=\"card-body\">
                <p class=\"card-text card-text-black\">Des connaissances et des compétences en technologie.</p>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top  mx-auto\" src=\"images/icone_transmission.png\" alt=\"image transmettre le savoir\">
            <div class=\"card-body\">
                <p class=\"card-text card-text-black \">Le souhait de transmettre votre savoir aux Seniors et de le mettre au service des personnes qui en  ont besoin.</p>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top mx-auto\" src=\"images/icone_cal.png\" alt=\"image disponibilitées\">
            <div class=\"card-body \">
                <p class=\"card-text card-text-black\">Des disponibilités en dehors de votre formation.</p>
            </div>
        </div>
    </div>

    <h1 class=\"text-size\"><b>Formations</b></h1>
    <hr/>
    <div class=\"my-4\">
        <p>Les spécialistes de Di Marino Consulting ont créé une formation spécifique pour donner à nos agents les meilleurs outils. La formation s’articule en 2 jours : </p>
        <ul>
            <li><h3>Premier jour :</h3> Formation aux compétences sociales</li>
            <li><h3>Deuxième jour :</h3> Formation aux services « Les Juniors au service des Seniors »</li>
        </ul>
    </div>

    <h1 class=\"text-size\"><b>Conditions de recrutement</b></h1>
    <hr/>
    <div class=\"my-4\">
        <ul>
            <li>Etre majeur et casier judiciaire vierge.</li>
            <li>Connaissances et compétences sur les services proposés par Generation Connect.</li>
            <li>Intérêt dans le social et dans le partage auprès d’autres générations.</li>
        </ul>
    </div>

    <span data-target=\"postuler\" class=\"btn w-100 mb-3\">Je postule!</span>

</div>",
            'employe_id' => 3
        ]);
        $page3->save();

        $page4 = new Page([
            'nom' => "infosSeniors",
            'contenu' => "<div class=\"mt-3 px-3\">

    <h1 class=\"text-size\"><b>Abonnements & tarifs</b></h1>
    <hr/>
    <div class=\"row mt-4\">
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top card-big mx-auto\" src=\"images/standard.png\" alt=\"image Abonnement LIGHT \">
            <div class=\"card-body bg-orange-trans\">
                <h5 class=\"card-title card-text-black\"><b>LIGHT</b></h5>
                <ul>
                    <li>Hotline</li>
                    <li>Service spécialisé à la demande</li>
                    <li>2 visites à domicile par an offertes</li>
                </ul>
            </div>
            <div class=\"card-footer bg-orange\">
                <b class=\"mx-auto\">CHF XX.-</b>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top card-big mx-auto\" src=\"images/meduim.png\" alt=\"image Abonnement Medium\">
            <div class=\"card-body bg-gris-trans\">
                <h5 class=\"card-title card-text-black\"><b>MEDIUM</b></h5>
                <ul>
                    <li>Hotline</li>
                    <li>Service spécialisé à la demande</li>
                    <li>1 visite à domicile par mois offerte</li>
                </ul>
            </div>
            <div class=\"card-footer bg-gris\">
                <b class=\"mx-auto\">CHF XX.-</b>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top card-big mx-auto\" src=\"images/premium.png\" alt=\"image Abonnement Premium\">
            <div class=\"card-body bg-jaune-trans\">
                <h5 class=\"card-title card-text-black\"><b>PREMIUM</b></h5>
                <ul>
                    <li>Hotline</li>
                    <li>Service spécialisé à la demande</li>
                    <li>1 visite à domicile par semaine offerte</li>
                </ul>
            </div>
            <div class=\"card-footer bg-jaune\">
                <b class=\"mx-auto\">CHF XX.-</b>
            </div>
        </div>
    </div>

    <h1 class=\"text-size\"><b>Nos services</b></h1>
    <hr/>

    <div class=\"row mt-4\">
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top  mx-auto\" src=\"images/icone_juan.png\" alt=\"image individualisé\">
            <h5 class=\"card-title card-text-black mt-2 mb-0\"><b>Service individualisé</b></h5>
            <div class=\"card-body\">
                <p class=\"card-text card-text-black\">Hotline : Contact téléphonique avec notre centrale, des professionnels sont à votre disposition pour toute demande de rendez-vous et toutes autres questions.</p>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top  mx-auto\" src=\"images/icone_lock.png\" alt=\"image sécurité\">
            <h5 class=\"card-title card-text-black mt-2 mb-0\"><b>Service individualisé</b></h5>
            <div class=\"card-body\">
                <p class=\"card-text card-text-black \">Visites à domicile: Les juniors sont identifiés, les visites sont annoncées et le nom et prénom du Junior intervenant est communique. Le Junior intervenant s’identifie à son arrivé.</p>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top mx-auto\" src=\"images/icone_graph.png\" alt=\"image Optimisation\">
            <h5 class=\"card-title card-text-black mt-2 mb-0\"><b>Service individualisé</b></h5>
            <div class=\"card-body \">
                <p class=\"card-text card-text-black\">Une évaluation de chaque prestation afin d’améliorer nos services de manière continue. </p>
            </div>
        </div>
    </div>

    <span data-target=\"inscription\" class=\"btn w-100 mb-3\">Inscription</span>
</div>


",
            'employe_id' => 3
        ]);
        $page4->save();

        $page5 = new Page([
            'nom' => "Schema d'intervention",
            'contenu' => "<h1>Schema d'intervention</h1>
    <p>à définir</p>",
            'employe_id' => 3
        ]);
        $page5->save();


    }
}
