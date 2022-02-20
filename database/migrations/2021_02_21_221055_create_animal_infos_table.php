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
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('farm_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('community_cat_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('community_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->unsignedBigInteger('animal_cat_id');
            $table->foreign('animal_cat_id')->references('id')->on('animal_cats')->cascadeOnUpdate();
            $table->unsignedBigInteger('animal_sub_cat_id')->nullable();
            $table->foreign('animal_sub_cat_id')->references('id')->on('animal_cats')->cascadeOnUpdate();
            $table->integer('animal_tag');
            $table->enum('type',['1','2'])->comment('1=Goat,2=Sheep');
            $table->integer('sire')->nullable();
            $table->integer('dam')->nullable();
            $table->string('color',80)->nullable();
            $table->enum('sex', ['M','F']);
            $table->boolean('is_reproductive')->default(0);
            $table->double('birth_wt',4,2);
            $table->string('litter_size');
            $table->integer('generation');
            $table->integer('paity')->nullable();
            $table->date('d_o_b');
            $table->string('season_o_birth',50)->nullable();
            $table->boolean('status')->default(0);
            $table->string('remark',100)->nullable();
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
        Schema::dropIfExists('animal_infos');
    }
}
