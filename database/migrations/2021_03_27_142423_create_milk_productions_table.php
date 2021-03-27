<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilkProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milk_productions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_info_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('type',['1','2'])->comment('1=Goat,2=Sheep');
            $table->date('date_of_milking');
            $table->float('milk_production');
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
        Schema::dropIfExists('milk_productions');
    }
}
