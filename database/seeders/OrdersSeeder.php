<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'order_number' => 'feo84dq',
                'order_date' => Carbon::now(),
                'rental_duration' => 2.00,
                'delivery_address_id' => 1,
                'advance_sum' => 1.00,
                'order_status' => 'Apmokėtas',
                'total_sum' => 3.00,
                'client_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'order_number' => 'hqy74uq',
                'order_date' => Carbon::now(),
                'rental_duration' => 3.00,
                'delivery_address_id' => 2,
                'advance_sum' => 1.00,
                'order_status' => 'Apmokėtas',
                'total_sum' => 3.00,
                'client_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'order_number' => 'yqd12oq',
                'order_date' => Carbon::now(),
                'rental_duration' => 2.00,
                'delivery_address_id' => 3,
                'advance_sum' => 1.00,
                'order_status' => 'Apmokėtas',
                'total_sum' => 3.00,
                'client_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('orders_trampolines')->insert([
            [
                'orders_id' => 1,
                'trampolines_id' => 9,
                'rental_start' => '2024-08-31',
                'rental_end' => '2024-09-02',
                'rental_duration' => 2.00,
                'delivery_time' => '8:00',
                'is_active' => 1,
                'total_sum' => 1.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'orders_id' => 1,
                'trampolines_id' => 8,
                'rental_start' => '2024-08-31',
                'rental_end' => '2024-09-02',
                'rental_duration' => 2.00,
                'delivery_time' => '8:00',
                'is_active' => 1,
                'total_sum' => 1.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'orders_id' => 2,
                'trampolines_id' => 2,
                'rental_start' => '2024-09-06',
                'rental_end' => '2024-09-09',
                'rental_duration' => 3.00,
                'delivery_time' => '8:00',
                'is_active' => 1,
                'total_sum' => 3.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'orders_id' => 3,
                'trampolines_id' => 9,
                'rental_start' => '2024-08-24',
                'rental_end' => '2024-08-26',
                'rental_duration' => 2.00,
                'delivery_time' => '8:00',
                'is_active' => 1,
                'total_sum' => 1.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'orders_id' => 3,
                'trampolines_id' => 8,
                'rental_start' => '2024-08-24',
                'rental_end' => '2024-08-26',
                'rental_duration' => 2.00,
                'delivery_time' => '8:00',
                'is_active' => 1,
                'total_sum' => 1.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('clients')->insert([
            [
                'name' => 'Užs. 1',
                'surname' => 'Užs. 1',
                'email' => 'uzs1@opop.lt',
                'phone' => '+3701111111',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Užs. 2',
                'surname' => 'Užs. 2',
                'email' => 'uzs2@opop.lt',
                'phone' => '+37022222222',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Užs. 3',
                'surname' => 'Užs. 3',
                'email' => 'uzs3@opop.lt',
                'phone' => '+37033333333',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('client_addresses')->insert([
            [
                'clients_id' => 1,
                'address_street' => 'Gatve nr. 1',
                'address_town' => 'Kaunas',
                'address_postcode' => '11111',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'clients_id' => 2,
                'address_street' => 'Gatve nr. 2',
                'address_town' => 'Kaunas',
                'address_postcode' => '22222',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'clients_id' => 3,
                'address_street' => 'Gatve nr. 3',
                'address_town' => 'Kaunas',
                'address_postcode' => '33333',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
