<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDewormingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dewormings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('animal_info_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('group');
            $table->boolean('medicine_type');
            $table->string('medicine_name',100);
            $table->date('deworming_date');
            $table->integer('num_of_animal');
            $table->string('dose',100);
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
        Schema::dropIfExists('dewormings');
    }
}
