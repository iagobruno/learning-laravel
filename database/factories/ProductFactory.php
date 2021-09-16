<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realTextBetween(20, 50),
            'price' => $this->faker->randomFloat(2, 20, 200),
            'qty' => $this->faker->numberBetween(1, 30),
            'description' => $this->faker->realText(1000),
            'status' => 'public',
        ];
    }

    public function private()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'private',
            ];
        });
    }

    public function draft()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'draft',
            ];
        });
    }
}
