<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::query()->insert([
            ["status"  => "Pending"],
            ["status"  => "In Progress"],
            ["status"  => "Completed"],
            ["status"  => "In Review"],
            ["status"  => "Approved"],
            ["status"  => "Rejected"],
            ["status"  => "Cancelled"],
            ["status"  => "Published"],
            ["status"  => "Valid"],
            ["status"  => "Invalid"],
        ]);
    }
}
