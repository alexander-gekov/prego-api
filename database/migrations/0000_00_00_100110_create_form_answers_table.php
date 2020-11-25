<?php
//
//use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
//
//class CreateFormanswersTable extends Migration
//{
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
//    public function up()
//    {
//        Schema::create('form_answers', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->json('answers');
//
//            $table->unsignedBigInteger('company_id')->index('company_id');
//            $table->unsignedBigInteger('visitor_id')->index('visitor_id');
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
//
//        });
//    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
//    public function down()
//    {
//        Schema::dropIfExists('form_answers');
//    }
//}
