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
        Schema::table('orders_trampolines', function (Blueprint $table) {
            $table->unique(['trampolines_id','rental_start', 'rental_end'], 'checkIfDateExists');
            $table->unique(['trampolines_id','rental_start'], 'checkIfRentalStartExists');
            $table->unique(['trampolines_id','rental_end'], 'checkIfRentalEndExists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('orders_trampolines');
    }
};
