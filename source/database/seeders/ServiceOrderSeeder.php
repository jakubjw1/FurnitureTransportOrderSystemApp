<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\ServiceOrder;

class ServiceOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        ServiceOrder::truncate();

        ServiceOrder::insert([
            [
                'service_id' => 1,
                'order_id' => 1,
            ],
            [
                'service_id' => 2,
                'order_id' => 2,
            ],
            [
                'service_id' => 4,
                'order_id' => 1,
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
