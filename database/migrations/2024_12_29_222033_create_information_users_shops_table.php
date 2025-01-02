<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('information_users_shops', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('name_bank');
            $table->boolean('agreed_terms')->default(false);
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
        Schema::dropIfExists('information_users_shops');
    }
     
};
