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
        try {
            Schema::table('items', function (Blueprint $table) {
                $table->string('parental_type')->after('id')->nullable();
            });

            \App\Models\Item::whereHas('items')->get()->each(function ($item) {
                $item->update(['parental_type' => \App\Models\Set::class]);
            });
            \App\Models\Item::doesntHave('items')->get()->each(function ($item) {
                $item->update(['parental_type' => \App\Models\Document::class]);
            });
        } catch (Exception $e) {
            logger()->error($e->getMessage());
            $this->down();
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('parental_type');
        });
    }
};
