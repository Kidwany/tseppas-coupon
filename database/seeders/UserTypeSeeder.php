<?php

namespace Database\Seeders;

use App\Models\User\Users_type;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users_type::query()->insert([
            [
                "type" => "client"
            ],
            [
                "type" => "admin"
            ],
        ]);
    }
}
