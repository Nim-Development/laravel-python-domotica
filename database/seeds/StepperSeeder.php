<?php

use Illuminate\Database\Seeder;

class StepperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Stepper::class, 8)->create();
    }
}
