<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_student')->nullable();
            $table->unsignedBigInteger('id_article')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('operation');

            $table->foreign('id_student')
                    ->references('id')->on('students')
                    ->onDelete('set null');

            $table->foreign('id_article')
                    ->references('id')->on('articles')
                    ->onDelete('set null');

            $table->foreign('id_user')
                    ->references('id')->on('users')
                    ->onDelete('set null');        

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
        Schema::dropIfExists('operations');
    }
}
