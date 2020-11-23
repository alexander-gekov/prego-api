<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('answers')->default(new Expression('(JSON_ARRAY())')); //Using an Expression instance will prevent wrapping the value in quotes and allow you to use database specific functions. One situation where this is particularly useful is when you need to assign default values to JSON columns.
            $table->unsignedBigInteger('form_id')->index('form_id');
            $table->unsignedBigInteger('visitor_id')->index('visitor_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_answers');
    }
}
