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
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->string('campaign_id')->nullable();
            $table->string('subject')->nullable();
            $table->string('preheader')->nullable();
            $table->string('primary_image')->nullable();
            $table->string('link')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });

        Schema::create('oauth', function (Blueprint $table) {
            $table->id();
            $table->string('provider')->unique();
            $table->string('token_type')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->mediumText('access_token')->nullable();
            $table->string('scope')->nullable();
            $table->string('refresh_token')->nullable();
            $table->mediumText('id_token')->nullable();
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
        Schema::dropIfExists('oauth');
        Schema::dropIfExists('newsletters');
    }
};
