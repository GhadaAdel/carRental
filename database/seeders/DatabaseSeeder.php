<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Category;
use App\Models\User;
use App\Models\Testimonial;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        Category::factory(5)->create();
        Car::factory(5)->create();
        Testimonial::factory(5)->create();
        Contact::factory(5)->create();
    }
}
