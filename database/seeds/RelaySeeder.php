<?php

use Illuminate\Database\Seeder;

class RelaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Relay::class, 4)->create();
    }
}
