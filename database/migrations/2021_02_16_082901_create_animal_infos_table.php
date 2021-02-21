<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('farm_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('community_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('size');
            $table->integer('dam');
            $table->integer('goat_tag');
            $table->string('color',80);
            $table->enum('sex', ['1','2'])->comment('1=Male,2=Female');
            $table->double('birth_wt',4,2);
            $table->integer('litter_size');
            $table->integer('generation');
            $table->integer('paity')->nullable();
            $table->integer('dam_milk')->nullable();
            $table->date('d_o_b');
            $table->date('season_d_o_b')->nullable();
            $table->date('death_date')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_infos');
    }
}
