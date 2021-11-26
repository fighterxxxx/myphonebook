<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Collaborateurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborateurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('civilité', array('Homme', 'Femme', 'Non-binaire'));
            $table->string('nom')->nullable(false);
            $table->string('prenom')->nullable(false);
            $table->string('rue')->nullable(false);
            $table->string('cp', 5)->nullable(false);
            $table->string('ville')->nullable(false);
            $table->string('téléphone', 10)->unique();
            $table->string('email')->unique()->nullable(false);
            $table->foreignId('entreprise_id')->constrained("entreprises");
            $table->timestamps();

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("collaborateurs", function (Blueprint $table) {
            $table->dropForeign("entreprise_id");
        });
        Schema::dropIfExists('collaborateurs');
    }
}
