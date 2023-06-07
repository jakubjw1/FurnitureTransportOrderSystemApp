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
                'order_date' => now(),
                'payment_method' => 'Credit Card',
                'order_status' => 'Pending',
            ],
            [
                'user_id' => 2,
                'car_id' => 2,
                'driver_id' => 3,
                'order_date' => \Carbon\Carbon::parse('2023-06-01 10:30:00'),
                'payment_method' => 'Credit Card',
                'order_status' => 'Pending',
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
