<?php

namespace Database\Seeders;

use App\Models\Academy;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Loan;
use App\Models\Operation;
use App\Models\Student;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        article::factory(100)->create();  
        
        $this->call(RoleSeeder::class);

        User::create([
            'name' => 'David Sardiñas Lima',
            'email' => 'genesis.david.08@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('Admin');

        User::factory(4)->create();
        Academy::factory(10)->create();
        Student::factory(50)->create();
        
    }
}
