<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrescriptionDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('details');
            $table->integer('food_id')->unsigned()->default(0);
            $table->string('time');
            $table->integer('prescription_id')->unsigned()->default(0);
            $table->foreign('prescription_id')->references('id')->on('prescriptions');
            $table->foreign('food_id')->references('id')->on('food');
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
        Schema::table('prescription_details', function (Blueprint $table) {
            $table->dropForeign('prescription_id');
            $table->dropColumn('prescription_id');
            $table->dropForeign('food_id');
            $table->dropColumn('food_id');
        });
        Schema::dropIfExists('prescription_details');
    }
}
