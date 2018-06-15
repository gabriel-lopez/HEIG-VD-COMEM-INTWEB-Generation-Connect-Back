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
    }
}
