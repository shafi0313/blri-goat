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
            $table->integer('puberty_age')->nullable();
            $table->date('service_1st_date')->nullable();
            $table->date('kidding_1st_date')->nullable();

            $table->float('ges_lenght_1st_kidding')->nullable();
            $table->float('age_1st_kidding')->nullable();
            $table->float('litter_size_1st_kidding')->nullable();
            $table->float('milk_production')->nullable();

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
            $table->string('remarks',50)->nullable();
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
