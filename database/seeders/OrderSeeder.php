<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Order;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Order::truncate();

        Order::insert([
            [
                'user_id' => 1,
                'car_id' => 1,
                'driver_id' => 1,
                'order_date' => \Carbon\Carbon::parse('2023-06-01 10:30:00'),
                'payment_method' => 'Credit Card',
                'total_amount' => '100.00',
                'order_status' => 'Done',
                'service_date' => \Carbon\Carbon::parse('2023-06-05'),
                'description' => 'Table 100x100x50',
                'from' => 'Rzeszow, Zalesie 123',
                'destination' => 'Rzeszow, Targowa 5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'car_id' => 2,
                'driver_id' => 3,
                'order_date' => \Carbon\Carbon::parse('2023-06-01 10:30:00'),
                'payment_method' => 'Cash',
                'total_amount' => '150.00',
                'order_status' => 'Done',
                'service_date' => \Carbon\Carbon::parse('2023-06-03'),
                'description' => 'Sofa 300x100x100',
                'from' => 'Rzeszow, Podkarpacka 45',
                'destination' => 'Sanok, Kolejowa 10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
