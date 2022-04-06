<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reviews;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reviews::factory(200)->create();
    }
}
