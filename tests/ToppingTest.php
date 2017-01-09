<?php

use App\Topping;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ToppingTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_creates_a_topping()
    {
        $newTopping = factory(Topping::class, 1)->create(['name' => 'New Topping']);
        $topping = Topping::find($newTopping->id);
        $this->assertTrue($topping->name === 'New Topping');
    }

    /** @test */
    public function it_fetches_a_list_of_toppings()
    {
        $toppings_count = Topping::count();

        if ($toppings_count === 0)
            factory(Topping::class, 10)->create();

        $toppings = Topping::all();

        $this->assertTrue($toppings->count() > 0);

    }

}
