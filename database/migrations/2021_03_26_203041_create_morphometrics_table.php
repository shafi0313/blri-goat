<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMorphometricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morphometrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_info_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('type',['1','2'])->comment('1=Goat,2=Sheep');
            $table->string('age');
            $table->float('body_lenght');
            $table->float('weither_height');
            $table->string('horn_pattern')->nullable();
            $table->float('horn_length')->nullable();
            $table->float('tail_length');
            $table->float('ear_length');
            $table->float('h_girth_length');
            $table->float('height_of_rump');
            $table->float('head_length');
            $table->float('eye_to_eye_length');
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
        Schema::dropIfExists('morphometrics');
    }
}
