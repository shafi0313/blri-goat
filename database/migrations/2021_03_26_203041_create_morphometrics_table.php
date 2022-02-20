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
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('farm_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('community_cat_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('community_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('animal_info_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->float('body_lenght')->nullable();
            $table->float('weither_height')->nullable();
            $table->string('horn_pattern')->nullable();
            $table->string('scrotum_length')->nullable();
            $table->string('scrotum_diameter')->nullable();
            $table->string('rump_height')->nullable();
            $table->string('rump_weight')->nullable();
            $table->string('rump_length')->nullable();
            $table->float('horn_length')->nullable();
            $table->float('tail_length')->nullable();
            $table->float('ear_length')->nullable();
            $table->float('h_girth_length')->nullable();
            $table->float('height_of_rump')->nullable();
            $table->float('head_length')->nullable();
            $table->float('eye_to_eye_length')->nullable();
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
