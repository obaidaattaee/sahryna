<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('category_id');
            $table->integer('city_id');
            $table->string('phone');
            $table->boolean('distribute_cost');
            $table->float('cost');
            $table->float('retail_price');
            $table->float('wholesale_price');
            $table->integer('number_of_partners');
            $table->integer('subscription_id');
            $table->json('images');
            $table->string('addres');
            $table->integer('delivery_time_id');
            $table->enum( 'type_of_price', ['wholesale' , 'retail']);
            $table->integer('advertisement_type_id');
            $table->timestamp('publish_date')->nullable() ;
            $table->timestamp('end_publish_date')->nullable() ;
            $table->softDeletes();
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
        Schema::dropIfExists('advertisements');
    }
}
