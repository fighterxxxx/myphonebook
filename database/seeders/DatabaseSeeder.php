<?php

namespace Database\Seeders;

use App\Models\Entreprise;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Entreprise::factory(15)->create();
        $this->call(UserSeeder::class);
        $this->call(EntrepriseSeeder::class);
        $this->call(CollaborateurSeeder::class);
    }
}
