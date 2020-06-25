<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer');
            $table->integer('id_project');
            $table->integer('id_user');
            $table->string('email')->unique();
            $table->enum('type',['Service Request','Problem Issue',])->default('Service Request');
            $table->text('description');
            $table->text('solution');
            $table->enum('priority',['1','2','3','4'])->default('1');
            $table->timestamp('created_time')->nullable();
            $table->timestamp('finished_time')->nullable();
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
        Schema::dropIfExists('ticket');
    }
}
