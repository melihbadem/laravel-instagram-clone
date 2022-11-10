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
        Schema::create('profile_information', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('site')->nullable();
            $table->string('bio')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('photo')->default('profile.png')->nullable();
            $table->string('sex')->nullable();
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProfileInformation');
    }
};
