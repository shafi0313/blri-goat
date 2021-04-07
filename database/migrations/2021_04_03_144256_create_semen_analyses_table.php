<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemenAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semen_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_info_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('type',['1','2'])->comment('1=Goat,2=Sheep');
            $table->date('coll_date');
            $table->float('volume');
            $table->string('s_color');
            $table->float('number_of_straw');
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
        Schema::dropIfExists('semen_analyses');
    }
}