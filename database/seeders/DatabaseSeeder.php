<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\InboxSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(InboxSeeder::class);

        User::factory()->create([
            'name' => 'Zaky Fathur Rahman',
            'email' => 'zaky@gmail.com',
        ]);
    }
}
