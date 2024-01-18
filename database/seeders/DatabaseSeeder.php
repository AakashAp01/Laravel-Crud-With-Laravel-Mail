<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Crud::factory(10)->create();

        // DB::table('cruds')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@.com',
        //     'phone' => Str::random(10),
        //     'password' => Hash::make('password')
        // ]);
    }
}
