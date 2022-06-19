<?php

namespace Database\Seeders;

use App\Models\ReceiverSender;
use Illuminate\Database\Seeder;

class ReceiverSenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReceiverSender::factory()->times(4)->create();
    }
}
