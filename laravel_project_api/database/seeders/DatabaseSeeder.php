<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Products;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'azerty63',
        ]);

//        <---------------------------------------------------------------------------->

        Category::factory()->create([
            'name' => 'Boissons',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.
            lorem ipsum dolor sit amet, consectetur adipiscing elit.lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
        Category::factory()->create([
            'name' => 'Salé',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.
            lorem ipsum dolor sit amet, consectetur adipiscing elit.lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
        Category::factory()->create([
            'name' => 'Sucré',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.
            lorem ipsum dolor sit amet, consectetur adipiscing elit.lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);

//        <---------------------------------------------------------------------------->
        Products::factory()->create([
            'name' => 'Icetea',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
        ]);
        Products::factory()->create([
            'name' => 'Oasis',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
        ]);
        Products::factory()->create([
            'name' => 'Coca',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
        ]);
        Products::factory()->create([
            'name' => 'FuzeTea',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
        ]);
        Products::factory()->create([
            'name' => 'Fantas',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
        ]);
    }
}
