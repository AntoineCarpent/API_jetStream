<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Post::factory(10)->create();

        Post::factory()->create([
            'name' => 'Icetea',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
            ]);
        Post::factory()->create([
            'name' => 'Oasis',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
            ]);
        Post::factory()->create([
            'name' => 'Coca',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
            ]);
    }
}
