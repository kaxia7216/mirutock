<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::create([
            'name' => 'いちご',
            'type' => 'cold',
            'piece' => '1',
            'unit' => 'パック',
            'limit' => '2024-05-31',
        ]);

        Stock::create([
            'name' => 'きゅうり',
            'type' => 'cold',
            'piece' => '2',
            'unit' => '本',
            'limit' => '2024-05-31',
        ]);

        Stock::create([
            'name' => '牛乳',
            'type' => 'cold',
            'piece' => '1',
            'unit' => 'パック',
            'limit' => '2024-05-31',
        ]);
    }
}
