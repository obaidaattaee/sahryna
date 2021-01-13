<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title') ;
            $table->text('description') ;
            $table->foreignId('category_id')->constrained('categories') ;
            $table->foreignId('city_id')->constrained('cities') ;
            $table->foreignId('user_id')->constrained('users') ;
            $table->double('price');
            $table->integer('subscription_id')->nullable();
            $table->json('images');
            $table->string('address');
            $table->date('publish_date');
            $table->date('end_publish_date');
            $table->string('lat');
            $table->string('long');
            $table->softDeletes();
            $table->integer('active')->default(0) ; // 0 to inactive 1 to active 2 to complete contribute 3 closed
            $table->boolean('verified')->default(0) ;
            $table->boolean('accepted')->default(0) ;
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
        Schema::dropIfExists('buyer_advertisements');
    }
}
