<?php

namespace Database\Seeders;

use App\Models\Copy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CopySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Copy::factory()
            ->count(10)
            ->create(); */

            Copy::create([
                'book_id' => 68,
                'prestado' => false
            ]);

            Copy::create([
                'book_id' => 68,
                'prestado' => false
            ]);

            Copy::create([
                'book_id' => 68,
                'prestado' => false
            ]);

            Copy::create([
                'book_id' => 68,
                'prestado' => false
            ]);
    }
}
