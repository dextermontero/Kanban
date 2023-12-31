<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_information', function (Blueprint $table) {
            $table->id();
            $table->integer('uid')->unsigned();
            $table->foreign('uid')->references('id')->on('users');
            $table->string('profile_img')->default('default.png');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('position')->nullable();
            $table->string('status')->default('active'); // Status : active | inactive | archived | deleted
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_information');
    }
};
