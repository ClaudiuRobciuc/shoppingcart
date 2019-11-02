<?php
namespace Tests\Unit;

use App\FruitModel;
use App\CartModel;
use Faker\Factory as Faker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddToCartTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Testing user creation.
     *
     * @return void
     */
    public function testAddToCart()
    {
        $faker = Faker::create();
        $data = [
            'image' => $faker->imageUrl(),
            'name' => $faker->word(),
            'price' => $faker->randomNumber(),
        ];

        $fruit = new FruitModel($data);
        $fruit->timestamps = false;
        $fruit->save();

        $response = $this->json('POST', '/addtocart/'.$fruit->id, ['amount' => '4']);

        $response->assertStatus(302);
        
        $this->assertDatabaseHas('fruits', [
            'name' => $fruit->name
        ]);
        
        $this->assertDatabaseHas('cart', [
            'product_id' => $fruit->id,
            'amount' => 4
        ]);

    }
}
