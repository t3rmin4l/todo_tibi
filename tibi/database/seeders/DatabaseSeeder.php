<?php

namespace Database\Seeders;

use App\Models\TodoItem;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        TodoItem::factory(10)->create();
    }
}
