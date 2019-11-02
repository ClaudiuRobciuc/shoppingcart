<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FruitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fruits')->insert([
            'image' => 'orange.jpg',
            'name' => 'Oranges',
            'price' => 10.50,
        ]);

        DB::table('fruits')->insert([
            'image' => 'apple.jpg',
            'name' => 'Apples',
            'price' => 9.35,
        ]);
    }
}
