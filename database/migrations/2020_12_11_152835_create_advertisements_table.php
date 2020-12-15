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
            $table->string('title') ;
            $table->text('description') ;
            $table->foreignId('category_id')->constrained('categories') ;
            $table->foreignId('city_id')->constrained('cities') ;
            $table->foreignId('user_id')->constrained('users') ;
            $table->string('phone');
            $table->boolean('distribute_cost')->default(0);
            $table->double('cost');
            $table->integer('number_of_partners');
            $table->double('retail_price');
            $table->double('wholesale_price');
            $table->foreignId('subscription_id')->constrained('subscriptions');
            $table->json('images');
            $table->string('address');
            $table->foreignId('delivery_time_id')->constrained('delivery_times');
            $table->foreignId('advertisement_type_id')->constrained('advertisement_types');
            $table->enum('type_of_price' , ['wholesale' , 'retail']);
            $table->date('publish_date');
            $table->date('end_publish_date');
            $table->string('lat');
            $table->string('long');
            $table->boolean('active')->default(0) ;
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
