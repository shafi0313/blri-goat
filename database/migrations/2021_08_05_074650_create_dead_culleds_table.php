<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeadCulledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dead_culleds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('farm_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('community_cat_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('community_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->unsignedBigInteger('animal_cat_id');
            $table->foreign('animal_cat_id')->references('id')->on('animal_cats')->cascadeOnUpdate();
            $table->unsignedBigInteger('animal_sub_cat_id')->nullable();
            $table->foreign('animal_sub_cat_id')->references('id')->on('animal_cats')->cascadeOnUpdate();
            $table->enum('type',['1','2'])->comment('1=Goat,2=Sheep');
            $table->enum('sex', ['M','F']);
            $table->foreignId('animal_info_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('dead_culled',20)->nullable();
            $table->string('reason')->nullable();
            $table->date('date_dead_culled')->nullable();
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
        Schema::dropIfExists('dead_culleds');
    }
}
