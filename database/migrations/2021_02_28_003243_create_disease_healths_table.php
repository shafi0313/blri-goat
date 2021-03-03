<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseaseHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_healths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_info_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('type',['1','2'])->comment('1=Goat,2=Sheep');
            $table->string('breed',80);
            $table->string('disease_name',150);
            $table->string('clinical_sign',150);
            $table->string('disease_season',150);
            $table->string('report',80);
            $table->date('deworming_date');
            $table->date('dipping_date');
            $table->date('ppr_vac_date');
            $table->date('fmd_vac_date');
            $table->date('pox_vacn_date');
            $table->date('contagious_vac_date');
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
        Schema::dropIfExists('disease_healths');
    }
}