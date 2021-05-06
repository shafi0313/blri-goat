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
            $table->foreignId('farm_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('community_cat_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('community_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->unsignedBigInteger('animal_cat_id');
            $table->foreign('animal_cat_id')->references('id')->on('animal_cats')->cascadeOnUpdate();
            $table->unsignedBigInteger('animal_sub_cat_id');
            $table->foreign('animal_sub_cat_id')->references('id')->on('animal_cats')->cascadeOnUpdate();
            $table->integer('animal_tag');
            $table->enum('type',['1','2'])->comment('1=Goat,2=Sheep');
            $table->tinyInteger('m_type')->comment('1=Patha,2=Khashi');
            // $table->tinyInteger('a_type')->comment('Amimal Type');
            $table->integer('sire');
            $table->integer('dam');
            $table->string('color',80)->nullable();
            $table->enum('sex', ['M','F']);
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
