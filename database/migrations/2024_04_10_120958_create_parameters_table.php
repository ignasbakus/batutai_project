<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->integer('trampolines_id')->nullable(false)->comment('Link to trampoline table');
            $table->string('color', 50);
            $table->decimal('height')->nullable(false);
            $table->decimal('width')->nullable(false);
            $table->decimal('length')->nullable(false);
            $table->decimal('rental_duration')->nullable(false);
            $table->string('rental_duration_type',4)->nullable(false);
            $table->boolean('activity')->nullable(false);
            $table->decimal('price')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parameters');
    }
};
