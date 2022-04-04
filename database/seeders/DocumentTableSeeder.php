<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::factory(1000)->create();
    }
}
