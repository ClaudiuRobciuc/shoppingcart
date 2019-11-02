<?php
namespace Tests\Unit;

use App\FruitModel;
use Faker\Factory as Faker;
use Tests\TestCase;

class FruitsUnitTest extends TestCase
{
    /**
     * Testing user creation.
     *
     * @return void
     */
    public function testFruitCreate()
    {
        $faker = Faker::create();
        $data = [
            'image' => $faker->imageUrl(),
            'name' => $faker->word(),
            'price' => $faker->randomNumber(),
        ];

        $fruit = new FruitModel($data);

        $this->assertEquals($data['image'], $fruit->image);
        $this->assertEquals($data['name'], $fruit->name);
        $this->assertEquals($data['price'], $fruit->price);

    }
}
