<?php

namespace Database\Seeders;

use App\Models\Coupon\CouponCategories;
use Illuminate\Database\Seeder;

class CouponCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CouponCategories::query()->insert([
            [
                "code"              => "12105",
                "title"             => "100 L.E Discount",
                "discount_type"     => 1,
                "amount"            => 100,
            ],
            [
                "code"              => "12106",
                "title"             => "200 L.E Discount",
                "discount_type"     => 1,
                "amount"            => 200,
            ],
            [
                "code"              => "12107",
                "title"             => "350 L.E Discount",
                "discount_type"     => 1,
                "amount"            => 350,
            ],
            [
                "code"              => "12107",
                "title"             => "500 L.E Discount",
                "discount_type"     => 1,
                "amount"            => 500,
            ],
        ]);
    }
}
