<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('period')->index();
            $table->year('year');
            $table->unsignedInteger('month');
            $table->unsignedInteger('day');
            $table->unsignedInteger('value');
            $table->integer('difference');
            $table->timestamps();

            $table->unique(['name', 'period', 'year', 'month']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stats');
    }
}