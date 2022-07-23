<?php

namespace Database\Seeders;

use App\Models\Sales\SalesType;
use Illuminate\Database\Seeder;

class SalesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalesType::query()->insert([
            ["name"  => "Items", "code" => "items"],
            ["name"  => "Coupons", "code"  => "coupons"],
        ]);
    }
}
