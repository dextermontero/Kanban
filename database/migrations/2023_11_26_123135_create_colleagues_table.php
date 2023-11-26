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
        Schema::create('colleagues', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('member_id');
            $table->string('status')->default('active'); // Status : active | inactive | complete | archived | deleted
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleagues');
    }
};
