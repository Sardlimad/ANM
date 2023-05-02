<?php

namespace Database\Seeders;

use App\Models\Academy;
use Illuminate\Database\Seeder;
use App\Models\article;
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
        User::factory(50)->create();
        Academy::factory(10)->create();
        Student::factory(50)->create();
        Operation::factory(50)->create();
        Loan::factory(50)->create();
        
    }
}
