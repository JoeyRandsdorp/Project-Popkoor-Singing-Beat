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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artist');
            $table->longText('lyrics');
            $table->longText('translation');
            $table->string('sheet_music');
            $table->string('full_song');
            $table->string('solo_song');
            $table->string('high_1_song');
            $table->string('high_2_song');
            $table->string('high_mid_1_song');
            $table->string('high_mid_2_song');
            $table->string('low_mid_1_song');
            $table->string('low_mid_2_song');
            $table->string('low_1_song');
            $table->string('low_2_song');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
};
