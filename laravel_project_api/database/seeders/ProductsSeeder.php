<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
