<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Message::class;

    public function definition()
    {
        return [
            'user_id' => rand(1, 2),
            'receiver_sender_id' => rand(1, 4),
            'message_text' => $this->faker->text(5),
        ];
    }
}
