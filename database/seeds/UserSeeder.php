<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'House',
            'email' => 'house@james-ball.co.uk',
            'password' => '$2y$10$WQ.y1FVGl/OqIwzTCPH/f.UET7g8BC9Z56M0dzKOuclw1dko/FG1.',
        ]);

        DB::table('users')->insert([
            'name' => 'James Ball',
            'email' => 'hello@james-ball.co.uk',
            'password' => '$2y$10$WQ.y1FVGl/OqIwzTCPH/f.UET7g8BC9Z56M0dzKOuclw1dko/FG1.',
        ]);
    }
}
