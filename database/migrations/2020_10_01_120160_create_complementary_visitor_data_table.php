<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplementaryvisitordataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complementary_visitor_data', function (Blueprint $table) {
            //$table->primary(['visitor_id', 'question_id']); //Adds a composite key
            $table->unsignedBigInteger('visitor_id')->index('visitor_id');
            $table->unsignedBigInteger('question_id')->index('question_id');
            $table->string('answer');
            $table->timestamps();
            $table->softDeletes();

            //$table->unique(['visitor_id','question_id']);

            $table->foreign('visitor_id')->references('id')->on('visitor_data')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complementary_visitor_data');
    }
}
