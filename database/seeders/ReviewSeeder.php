<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Books;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::factory()    
                ->count(5)            
                ->has(User::factory()->count(5))
                ->has(Books::factory()->count(5))
                ->create();
    }
}
