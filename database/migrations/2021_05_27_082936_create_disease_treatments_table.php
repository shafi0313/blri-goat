<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseaseTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_treatments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_info_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('type',['1','2'])->comment('1=Goat,2=Sheep');
            $table->string('breed',50);
            $table->string('disease_name',155);
            $table->string('clinical_sign',155)->nullable();
            $table->string('disease_season',155);
            $table->text('medicine_prescribed')->nullable();
            $table->string('recovered_dead',155)->nullable();
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
        Schema::dropIfExists('disease_treatments');
    }
}
