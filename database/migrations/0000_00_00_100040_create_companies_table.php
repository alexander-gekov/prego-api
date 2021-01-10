<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('manager_id')->index('manager_id');
            $table->unsignedBigInteger('building_owner_id')->index('building_owner_id');
            $table->string('company_name');
            $table->string('office_number');
            $table->string('manager_name');
            $table->text('description')->nullable();
            $table->text('history')->nullable();
            $table->text('img1')->nullable();
            $table->text('img2')->nullable();
            $table->text('img3')->nullable();
            $table->text('logo_img');
            $table->integer('visitors_count');
            $table->integer('current_visitors');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('manager_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('building_owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
