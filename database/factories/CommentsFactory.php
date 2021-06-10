<?php

namespace Database\Factories;

use App\Models\Comments;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->realText(191),
            'user_id' => $this->faker->numberBetween(1,10),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ];
    }
}
