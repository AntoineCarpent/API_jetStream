<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Products;
use App\Models\User;


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

//        <--------------------Categories-------------------------------------------------------->

        $dinks = Category::factory()->create([
            'name' => 'Boissons',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.
            lorem ipsum dolor sit amet, consectetur adipiscing elit.lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
        $saltyFood = Category::factory()->create([
            'name' => 'Salé',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.
            lorem ipsum dolor sit amet, consectetur adipiscing elit.lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
        $sweetFood = Category::factory()->create([
            'name' => 'Sucré',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.
            lorem ipsum dolor sit amet, consectetur adipiscing elit.lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);

//        <--------------------Products-------------------------------------------------------->
//        <--------------------Drinks-------------------------------------------------------->
        Products::factory()->create([
            'name' => 'FuzeTea',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
            'image' => fake()->randomelement(['storage/image/ZvbTwpiFRQvtDUnkBsSyg2gNbb3MtHvWYqULL7rO.jpg']),

        ])->categories()->attach($dinks);

        Products::factory()->create([
            'name' => 'Oasis',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
            'image' => fake()->randomelement(['storage/image/GzWL4e9dHRSmWnQ3WyrmqVrhRsCNf2e2bi3dlIhf.webp']),

        ])->categories()->attach($dinks);

        Products::factory()->create([
            'name' => 'Fantas',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
            'image' => fake()->randomelement(['storage/image/kHvsTzgDwdk9exE3Sc7lygv9m0O0U0mtKygJ6uUa.jpg']),

        ])->categories()->attach($dinks);

        Products::factory()->create([
            'name' => 'IceTea',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
            'image' => fake()->randomelement(['storage/image/cduU3W646A9hzYzBob0g8UKB0KXVMtyLp8ZTykhR.jpg']),

        ])->categories()->attach($dinks);

        Products::factory()->create([
            'name' => 'Coca',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',
            'image' => fake()->randomelement(['storage/image/Mt3OFXQXX2mWu2NqhcZcYETuE4IWfhoI9GDmHOSu.jpg']),

        ])->categories()->attach($dinks);
//        <--------------------Salty food-------------------------------------------------------->
        Products::factory()->create([
            'name' => 'Pizza',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',

        ])->categories()->attach($saltyFood);

        Products::factory()->create([
            'name' => 'Burger',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',

        ])->categories()->attach($saltyFood);

        Products::factory()->create([
            'name' => 'Hot Dog',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',

        ])->categories()->attach($saltyFood);

        Products::factory()->create([
            'name' => 'Bagel',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',

        ])->categories()->attach($saltyFood);

        Products::factory()->create([
            'name' => 'Sandwich',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',

        ])->categories()->attach($saltyFood);
//        <--------------------Sweet food-------------------------------------------------------->
        Products::factory()->create([
            'name' => 'Glaces',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',

        ])->categories()->attach($sweetFood);

        Products::factory()->create([
            'name' => 'Bonbons',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',

        ])->categories()->attach($sweetFood);

        Products::factory()->create([
            'name' => 'Chouchous',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',

        ])->categories()->attach($sweetFood);

        Products::factory()->create([
            'name' => 'Beignet nutella',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',

        ])->categories()->attach($sweetFood);

        Products::factory()->create([
            'name' => 'Beignet fraise',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => '20',
            'stock' => '100',

        ])->categories()->attach($sweetFood);
    }
}
