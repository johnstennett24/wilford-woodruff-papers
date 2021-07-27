<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImportedAtColumnToPagesAndItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dateTime('imported_at')->nullable();
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->dateTime('imported_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('imported_at');
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('imported_at');
        });
    }
}