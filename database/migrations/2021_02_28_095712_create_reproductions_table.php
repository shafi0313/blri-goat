<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReproductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reproductions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_info_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('type',['1','2'])->comment('1=Goat,2=Sheep');
            $table->integer('puberty_age');
            $table->date('service_1st_date');
            $table->date('kidding_1st_date');
            $table->integer('kidding_1st_age');
            $table->float('kidding_1st_liter');
            $table->float('milk_production');

            $table->date('service_2nd_date')->nullable();
            $table->date('kidding_2nd_date')->nullable();
            $table->float('kidding_2nd_liter')->nullable();

            $table->date('service_3rd_date')->nullable();
            $table->date('kidding_3rd_date')->nullable();
            $table->float('kidding_3rd_liter')->nullable();

            $table->date('service_4th_date')->nullable();
            $table->date('kidding_4th_date')->nullable();
            $table->float('kidding_4th_liter')->nullable();

            $table->date('service_5th_date')->nullable();
            $table->date('kidding_5th_date')->nullable();
            $table->float('kidding_5th_liter')->nullable();

            $table->date('service_6th_date')->nullable();
            $table->date('kidding_6th_date')->nullable();
            $table->float('kidding_6th_liter')->nullable();
            $table->string('report',50)->nullable();
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
        Schema::dropIfExists('reproductions');
    }
}
