<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMethodUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('method_user', function (Blueprint $table) {
            $table->unsignedBigInteger('method_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('attempt')->default(0);
            $table->boolean('completed')->default(false);

            $table->foreign('method_id')
                ->references('id')
                ->on('methods')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_method');
    }
}
