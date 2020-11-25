<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id'); // maybe remove and use a composite key

            $table->json('answers'); // stores the form answers

            //<editor-fold desc="Description">
            // these columns are used to pass the commonly used visitor data stored in the form answers
            // without the need to get the entire json and parse the fields from it
            //</editor-fold>
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();

            $table->unsignedBigInteger('employee_id')->index();

            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
