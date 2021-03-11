<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->efficientUuid('uuid')->index();
            $table->string('name');
            $table->string('ftp_id')->nullable()->index();
            $table->longText('transcript')->nullable();
            $table->timestamps();

            $table->foreign('item_id')
                ->references('id')
                ->on('items');
        });

        Schema::create('page_subject', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id');
            $table->unsignedBigInteger('subject_id');
            $table->primary(['page_id', 'subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_subject');
        Schema::dropIfExists('pages');
    }
}
