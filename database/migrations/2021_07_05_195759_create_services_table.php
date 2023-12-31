<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('farm_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('community_cat_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('community_id')->nullable()->constrained()->cascadeOnUpdate();
            
            $table->unsignedBigInteger('buck_tag')->comment('animal tag, sire')->index();
            $table->foreign('buck_tag')->references('id')->on('animal_infos')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('doe_tag')->comment('animal tag, dam')->index();
            $table->foreign('doe_tag')->references('id')->on('animal_infos')->onUpdate('cascade')->onDelete('cascade');
            // $table->integer('buck_tag')->index();
            // $table->integer('doe_tag')->index();
            $table->boolean('is_giving_birth')->default(0);
            $table->date('date_of_service');
            $table->date('expected_d_o_b');
            $table->string('natural',100)->nullable();
            $table->string('repeat_heat',50)->nullable();
            $table->integer('generation')->nullable();
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
        Schema::dropIfExists('services');
    }
}
