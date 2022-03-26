<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        if (!User::where('email', 'admin@alpec.com')->count())
            User::create([
                'name' => 'Admin',
                'email' => 'admin@alpec.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('admin%ADMIN')
            ]);
    }
}
