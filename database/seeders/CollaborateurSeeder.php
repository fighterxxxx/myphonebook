<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollaborateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collaborateurs')->insert([
            'civilité' => 'Homme',
            'nom' => 'Gon',
            'prenom' => 'Kirua',
            'rue' => '21 rue du Shonen',
            'cp' => '75006',
            'ville' => 'Jump',
            'téléphone' => '0645523479',
            'email' => 'lol@riot.com',
            'entreprise_id' => '1'
        ]);
    }
}
