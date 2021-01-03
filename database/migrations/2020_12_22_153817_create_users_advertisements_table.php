<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('advertisement_id')->constrained('advertisements');
            $table->integer('status') ;  // [0 => 'قيد الانتظار'] [1 => اكتملت المشاركات] [2 => "تم استلام المنتج"]
            $table->integer('number_of_parts') ;
            $table->string('code') ;
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
        Schema::dropIfExists('users_advertisements');
    }
}
