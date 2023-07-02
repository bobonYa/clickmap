<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // parent_id | order | title         | icon         | uri
        DB::table('admin_menu')->insert([
            'parent_id' => 0,
            'order' => 8,
            'title' => "Projests",
            'icon' => 'fa-bars',
            'uri' => 'projects'
            // 'password' => Hash::make('password'),
        ]);
    }
}
