<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('wellcom_message');
            $table->string('domain');
            $table->string('logo_image');
            $table->longText('goals');
            $table->longText('idea');
            $table->longText('possible');
            $table->longText('polices');
            $table->json('social')->nullable();
            $table->json('slider_images')->nullable();
            $table->string('description');
            $table->boolean('buyer_subscription')->default(0) ;
            $table->boolean('profile_verification')->default(1) ; // 0 user must verify profile
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
        Schema::dropIfExists('settings');
    }
}
