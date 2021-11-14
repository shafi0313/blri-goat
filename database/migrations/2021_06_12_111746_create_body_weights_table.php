<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_weights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('animal_info_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->float('month_1')->nullable();
            $table->float('month_2')->nullable();
            $table->float('month_3')->nullable();
            $table->float('month_4')->nullable();
            $table->float('month_5')->nullable();
            $table->float('month_6')->nullable();
            $table->float('month_7')->nullable();
            $table->float('month_8')->nullable();
            $table->float('month_9')->nullable();
            $table->float('month_10')->nullable();
            $table->float('month_11')->nullable();
            $table->float('month_12')->nullable();
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
        Schema::dropIfExists('body_weights');
    }
}
