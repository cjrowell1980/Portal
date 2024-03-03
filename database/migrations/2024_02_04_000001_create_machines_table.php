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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();

            $table->string('stock');
            $table->string('asset')->nullable();
            $table->string('serial');
            $table->string('make');
            $table->string('model');
            $table->year('yom');

            $table->unsignedBigInteger('customer')->index();
            $table->foreign('customer')->references('id')->on('customers')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
