<?php

namespace Database\Seeders;

use App\Models\DoneHomework;
use Illuminate\Database\Seeder;

class DoneHomeworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DoneHomework::factory()
            ->count(5)
            ->create();
    }
}
