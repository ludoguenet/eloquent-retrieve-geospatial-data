<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::factory(99)->create();

        Shop::factory()->create([
            'name' => 'Boutique à Hyères',
            'address' => '123, Chemin du test 83400 Hyères',
            'latitude' => 43.116669,
            'longitude' => 6.11667,
        ]);
    }
}
