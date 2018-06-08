<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    public function run()
    {
        $page1 = new Page([
            'nom' => "Page #1",
            'contenu' => "<b>bite</b>",
            'employe_id' => 3
        ]);

        $page1->save();

        $page2 = new Page([
            'nom' => "Page #2",
            'contenu' => "<b>boobs</b>",
            'employe_id' => 3
        ]);

        $page2->save();
    }
}
