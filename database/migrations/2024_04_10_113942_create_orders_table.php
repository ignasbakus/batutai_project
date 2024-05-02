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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 20); /*UNIQ STRING - HSjhdjdj */
            $table->dateTime('order_date');
            $table->dateTime('delivery_date');
            $table->integer('trampolines_id'); /*Ar gali buti uzsakomas dauygiau negu vienas batutas ? | Sitas principas tinka tik jei uzsakymas turi viena batuta*/
            $table->float('rental_duration', 5); /*Kodel float - todel kad jeigu ateityje kils poreikis valandu paskaitai, gali kilti situacija kai bus x.6 val.*/
            $table->integer('delivery_address_id'); /*Mano pasiulymas yra daryti atskira adresu teibla, ir adresus siesti tu klienut*/
            $table->float('advance_sum', 5); /*Kiek klientas sumokejo avanso*/
            $table->float('total_sum', 5); /*Bendra mokama suma*/
            $table->integer('client_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
