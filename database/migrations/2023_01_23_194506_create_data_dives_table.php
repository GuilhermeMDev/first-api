<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_dives', function (Blueprint $table) {
            $table->id();
            $table->integer('depth');
            $table->integer('no-stop-limit');
            $table->integer('A');
            $table->integer('B');
            $table->integer('C');
            $table->integer('D');
            $table->integer('E');
            $table->integer('F');
            $table->integer('G');
            $table->integer('H');
            $table->integer('I');
            $table->integer('J');
            $table->integer('K');
            $table->integer('L');
            $table->integer('M');
            $table->integer('N');
            $table->integer('O');
            $table->integer('Z');
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
        Schema::dropIfExists('data_dives');
    }
};
