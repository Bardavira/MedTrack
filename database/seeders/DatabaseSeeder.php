<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Company::firstOrCreate([
            'id' => 1,
        ], [
            'name' => 'MedTrack'
        ]);

        User::firstOrCreate([
            'email' => 'admin@medtrack.com'
        ], [
            'name' => 'admin',
            'email' => 'admin@medtrack.com',
            'password' => Hash::make('medtrack'),
            'company_id' => 1
        ]);
    }
}
