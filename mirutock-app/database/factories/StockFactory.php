<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Stock;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    protected $model = Stock::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //type, piece, unitの生成
        $type = $this->faker->randomElement(['cold', 'ice']);
        $numberOfItems = $this->faker->randomNumber(2, false);
        $piece = min(10, $numberOfItems);

        //ランダムな日付の生成
        $startDate = Carbon::parse('-1 year'); // 過去の範囲の開始日
        $endDate = Carbon::parse('+1 year'); // 未来の範囲の終了日
        $randomDate = $this->faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d');

        return [
            'name' => $this->faker->unique()->word,
            'type' => $type,
            'piece' => $piece,
            'limit' => $randomDate,
        ];
    }
}
