<?php

use Illuminate\Database\Seeder;

class ServoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Servo::class, 8)->create();
    }
}
