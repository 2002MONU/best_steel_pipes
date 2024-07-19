<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('project_complete');
            $table->string('satisfied_client');
            $table->string('experienced_staff');
            $table->string('award_win');
            $table->string('project_icon1');
            $table->string('satisfied_icon2');
            $table->string('experienced_icon3');
            $table->string('award_icon4');
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('linked_link')->nullable();
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
        Schema::dropIfExists('our_achievements');
    }
}
