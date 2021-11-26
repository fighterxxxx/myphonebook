<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entreprises')->insert([
            'nom' => 'TechKorp',
            'rue' => '27 rue jean jarc',
            'cp' => '75019',
            'ville' => 'Paris',
            'téléphone' => '0645523478',
            'email' => 'tkotp@gmail.com'
        ]);
        DB::table('entreprises')->insert([
            'nom' => 'Gelia',
            'rue' => '87 rue gambetta',
            'cp' => '75018',
            'ville' => 'Paris',
            'téléphone' => '0612131415',
            'email' => 'gelia@gmail.com'
        ]);
        DB::table('entreprises')->insert([
            'nom' => 'FormAthlete',
            'rue' => '56 rue du sportif',
            'cp' => '75003',
            'ville' => 'Paris',
            'téléphone' => '0612345678',
            'email' => 'sixpacks@formathlete.com'
        ]);
    }
}
