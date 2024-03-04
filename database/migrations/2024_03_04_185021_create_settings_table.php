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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('status_1')->index();
            $table->foreign('status_1')->references('id')->on('statuses');
            
            $table->unsignedBigInteger('status_2')->index();
            $table->foreign('status_2')->references('id')->on('statuses');
            
            $table->unsignedBigInteger('status_3')->index();
            $table->foreign('status_3')->references('id')->on('statuses');
            
            $table->unsignedBigInteger('status_4')->index();
            $table->foreign('status_4')->references('id')->on('statuses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
