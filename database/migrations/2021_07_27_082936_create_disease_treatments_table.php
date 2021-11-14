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
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('animal_info_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('animal_cat_id');
            $table->foreign('animal_cat_id')->references('id')->on('animal_cats')->cascadeOnUpdate();
            $table->unsignedBigInteger('animal_sub_cat_id')->nullable();
            $table->foreign('animal_sub_cat_id')->references('id')->on('animal_cats')->cascadeOnUpdate();
            $table->enum('type',['1','2'])->comment('1=Goat,2=Sheep');
            // $table->foreignId('disease_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            // $table->foreignId('clinical_sign_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('disease')->nullable();
            $table->string('clinical_sign')->nullable();
            $table->string('disease_season')->nullable();
            $table->date('disease_date');
            $table->text('medicine_prescribed')->nullable();
            $table->string('recovered_dead',35)->nullable();
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
