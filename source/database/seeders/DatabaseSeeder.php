<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Driver;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CarSeeder::class,
            ServiceSeeder::class,
            DriverSeeder::class,
            OrderSeeder::class,
            ServiceOrderSeeder::class,
        ]);
    }
}
