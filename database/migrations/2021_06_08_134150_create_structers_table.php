<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structers', function (Blueprint $table) {

            $table->id();
            $table->string('code_structer');
            $table->date('date_creation');
            $table->string('type_structure');
            $table->string('matricule_fiscale');
            $table->string('jort_creation');
            $table->string('num_compte_bancaire');
            $table->foreignId('secteur_id')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('structers');
    }
}
