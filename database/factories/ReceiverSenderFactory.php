<?php

namespace Database\Factories;

use App\Models\ReceiverSender;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceiverSenderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = ReceiverSender::class;

    public function definition()
    {
        return [
            'sender_id' => rand(1, 2),
            'receiver_id' => rand(1, 10)
        ];
    }
}
