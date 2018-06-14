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
            <p>Les Juniors se mettent au service des Seniors pour les accompagner dans la révolution digitale. Informatique, téléphonie, télévision, robotisation, programmation et utilisation de services en ligne sont autant de sujets que les Juniors peuvent transmettre aux seniors.</p>
            <p>Generation Connect vous propose un service basé sur le relationnel et la sécurité. Des agents juniors formés aux compétences sociales interviennent chez les seniors. Les interventions peuvent être ponctuelles ou suivies selon les besoions de chacun.</p>
        </h2>
    </div>

    <h1 class=\"text-size\"><b>Nos services</b></h1>
    <hr/>
    <div class=\"row my-4\">
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4 \" style=\"max-width: 18rem; border:0px;\">
            <div class=\"card-header bg-orange \"><b class=\"mx-auto\">Installations</b></div>
            
                <ul class=\"list-group list-group-flush\">                
                    <li class=\"bg-orange-trans list-group-item\">Téléphonie digitale</li>
                    <li class=\"bg-orange-trans list-group-item\">Télévision numérique </li>
                    <li class=\"bg-orange-trans list-group-item\">Connexion Internet</li>
                    <li class=\"bg-orange-trans list-group-item\">Messageries</li>
                    <li class=\"bg-orange-trans list-group-item\">Radio</li>
                    <li class=\"bg-orange-trans list-group-item\">PC</li>
                    <li class=\"bg-orange-trans list-group-item\">Smartphones & leurs applications</li>
                    <li class=\"bg-orange-trans list-group-item\">Robot ménagers</li>
                    <li class=\"bg-orange-trans list-group-item\">Installations de sécurité</li>
                </ul>
            
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4 \" style=\"max-width: 18rem; border:0px;\">
            <div class=\"card-header bg-gris \"><b>Mises à jour</b></div>
            
                <ul class=\"list-group list-group-flush\">
                    <li class=\"bg-gris-trans list-group-item\">Windows</li>
                    <li class=\"bg-gris-trans list-group-item\">Anti virus</li>
                    <li class=\"bg-gris-trans list-group-item\">Connexion Internet</li>
                    <li class=\"bg-gris-trans list-group-item\">PC</li>
                    <li class=\"bg-gris-trans list-group-item\">Smartphones & leurs applications</li>
                    <li class=\"bg-gris-trans list-group-item\">Robot ménagers</li>
                    <li class=\"bg-gris-trans list-group-item\">Installations de sécurité)</li>
                </ul>
            
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4 \" style=\"max-width: 18rem; border:0px;\">
            <div class=\"card-header bg-jaune\"><b>Utilisation</b></div>
            
                <ul class=\"bg-jaune-trans list-group list-group-flush\">
                    <li class=\"bg-jaune-trans list-group-item\">Communication par la vidéo</li>
                    <li class=\"bg-jaune-trans list-group-item\">Messagerie : envoi d'e-mails et des photos</li>
                    <li class=\"bg-jaune-trans list-group-item\">Services en ligne : apprendre à les utiliser et y faire des achats</li>
                    <li class=\"bg-jaune-trans list-group-item\">Photographie numérique : créer des albums etretoucher ses clichés </li>
                    <li class=\"bg-jaune-trans list-group-item\">Jeux : découvrir les jeux vidéos , des applications éducatives de divertissement</li>
                    <li class=\"bg-jaune-trans list-group-item\">Applications mobiles : tirer parti de son smartphones</li>
                </ul>
           
        </div>
    </div>

    <h1 class=\"text-size\"><b>Nos prestations</b></h1>
    <hr/>
    <div class=\"row mt-4\">
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top mx-auto\" src=\"images/icone_tel.png\" alt=\"image hotline\">
            <div class=\"card-body\">
                <h5 class=\"card-title card-text-black\">Hotline</h5>
                <p class=\"card-text card-text-black\">Notre hotline assiste les seniors et si nécessaire, organise une visite à domicile dans les 48h.</p>
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
           
            <img class=\"mr-3 img-left\" src=\"images/nosagents.jpg\" alt=\"image nos agents\">
            
                <h2 class=\"py-3\">Nos agents sont triés sur le volet</h2>
                <p>Nous sélectionnons nos collaborateurs afin qu’ils aient toutes les compétences tant informatiques que sociales.</p>
                <p>Les spécialistes de Di Marino Consulting ont créé une formation spécifique pour donner à nos agents les meilleurs outils.</p>
                <p>Dans les 48h suivant leur appel, l’un de nos agents sera chez notre cotisant.</p>
           
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

    <h1 class=\"text-size\"><b>Rejoignez-nous !</b></h1>
    <hr/>
    <h2 class=\"text-center\">Vous êtes étudiants ou apprentis et vous avez : </h2>
    <div class=\"row mt-4\">
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top  mx-auto\" src=\"images/icone_tech.png\" alt=\"image technologies\">
            <div class=\"card-body\">
                <p class=\"card-text card-text-black\">Des connaissances et des compétences en technologie</p>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top  mx-auto\" src=\"images/icone_transmission.png\" alt=\"image transmettre le savoir\">
            <div class=\"card-body\">
                <p class=\"card-text card-text-black \">Le souhait de transmettre votre savoir aux Seniors et de le mettre au service des personnes qui en  ont besoin</p>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top mx-auto\" src=\"images/icone_cal.png\" alt=\"image disponibilitées\">
            <div class=\"card-body \">
                <p class=\"card-text card-text-black\">Des disponibilités en dehors de votre formation</p>
            </div>
        </div>
    </div>

<div class=\"row\">
<div class=\"col-6\">
    <h1 class=\"text-size\"><b>Formations</b></h1>
    <hr/>
    
    <div> 
        <p>Avant d'être lancé sur le terrain, vous recevrez une formation complète qui vous permettra d'aider au mieux les seniors et de vous sentir à l'aise dans la transmission de vos savoirs. La formation s'articule autour de deux axes :  </p>
        <ul>
            <li>Formation aux compétences sociales</li>
            <li>Formation aux services « Les Juniors au service des Seniors »</li>
        </ul>
        <p> Au terme de votre formation, vous serez en mesure d'effectuer vos premières missions chez un senior.</p>
    </div>
</div>

<div class=\"col-6\">
    <h1 class=\"text-size\"><b>Conditions de recrutement</b></h1>
    <hr/>
    <p>Il est important que les seniors puissent avoir toute confiance en la plateforme génération connecte c'est pourquoi nous avons besoin que les juniors que nous recrutons remplissent les conditions suivantes : </p>
        <ul>
            <li>Etre majeur et avoir un casier judiciaire vierge.</li>
            <li>Avoir des connaissances et des compétences approfondies dans les domaines proposés par Generation Connect.</li>
            <li>Avoir un intérêt pour le travail social et l'échange intergénérationnel</li>
        </ul>
    </div>
</div>
<div class=\"row\">
<div class=\"col-4 mx-auto\">
    <a href=\"#postuler\" class=\" btn w-100 mb-3 center-block\">Je postule!</a>
</div>
</div>
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
                    <li>2 visites à domicile offertes par an</li>
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
                <p class=\"card-text card-text-black\">
                Notre hotline répond à vos questions et prend note de vos besoins. Nous nous occupons d'organiser le passage d'un junior en fonction de vos disponibilités.
                </p>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top  mx-auto\" src=\"images/icone_lock.png\" alt=\"image sécurité\">
            <h5 class=\"card-title card-text-black mt-2 mb-0\"><b>Service sécurisé</b></h5>
            <div class=\"card-body\">
                <p class=\"card-text card-text-black \">Les juniors qui se rendent à votre domicile sont sélectionnés et formés.
                les visites sont annoncées et le nom et prénom du Junior intervenant vous est communiqué. Le Junior intervenant s’identifie à son arrivé. Vous pourrez donc le recevoir en toute confiance.</p>
            </div>
        </div>
        <div class=\"card col-sm-12 col-lg-auto text-white p-0  mx-auto my-4  card-noborder\" style=\"width: 18rem;\">
            <img class=\"card-img-top mx-auto\" src=\"images/icone_graph.png\" alt=\"image Optimisation\">
            <h5 class=\"card-title card-text-black mt-2 mb-0\"><b>En amélioration constante</b></h5>
            <div class=\"card-body \">
                <p class=\"card-text card-text-black\">Nous améliorons nos services en permanence. Pour ce faire, à chaque intervention à votre domicile, vous avez la possibilité d'évaluer  et de commenter le service que vous avez reçu.</p>
            </div>
        </div>
    </div>

    <a href=\"#inscription\" class=\"btn w-100 mb-3\">Inscription</a>
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
