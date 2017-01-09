<?php

use App\Pizza;
use App\Topping;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PizzaTest extends TestCase
{

    use DatabaseTransactions;

    /** @test */
    public function it_creates_a_pizza()
    {
        $newPizza = factory(Pizza::class, 1)->create(['name' => 'New Pizza']);
        $pizza = Pizza::find($newPizza->id);
        $this->assertTrue($pizza->name === 'New Pizza');
    }

    /** @test */
    public function it_fetches_a_list_of_pizzas()
    {
        $pizzas_count = Pizza::count();

        if ($pizzas_count === 0)
            factory(Pizza::class, 10)->create();

        $pizzas = Pizza::all();

        $this->assertTrue($pizzas->count() > 0);

    }

    /** @test */
    public function it_adds_a_topping_to_pizza()
    {
        //create a pizza
        $newPizza = factory(Pizza::class, 1)->create(['name' => 'New Pizza']);
        //Create a topping
        $newTopping = factory(Topping::class, 1)->create(['name' => 'New topping']);

        $pizzaPie = Pizza::find($newPizza->id);

        //attach a topping
        $pizzaPie->toppings()->attach($newTopping);

        $pizza_with_toppings = Pizza::where('id', '=', $newPizza->id)->with('toppings')->first();

        $this->assertTrue($pizza_with_toppings->toppings[0]->name === 'New topping');

        $this->assertFalse($pizza_with_toppings->toppings[0]->name === 'Old topping');

    }

    /** @test */
    public function it_removes_a_topping_from_pizza()
    {
        //create a pizza
        $newPizza = factory(Pizza::class, 1)->create(['name' => 'New Pizza']);
        //Create a topping
        $newTopping = factory(Topping::class, 1)->create(['name' => 'New topping']);
        $pizzaPie = Pizza::find($newPizza->id);
        //attach a topping
        $pizzaPie->toppings()->attach($newTopping);
        $pizza_with_toppings = Pizza::where('id', '=', $newPizza->id)->with('toppings')->first();

        //Assert topping has been added
        $this->assertTrue($pizza_with_toppings->toppings[0]->name === 'New topping');
        $this->assertTrue(count($pizza_with_toppings->toppings) === 1);

        //Remove a topping
        $pizzaPie->toppings()->detach($newTopping);
        $pizza_with_toppings = Pizza::where('id', '=', $newPizza->id)->with('toppings')->first();

        //Assert topping has been removed
        $this->assertTrue(count($pizza_with_toppings->toppings) === 0);


    }

    /** @test */
    public function it_lists_toppings_of_a_pizza()
    {
        //create a pizza
        $newPizza = factory(Pizza::class, 1)->create(['name' => 'New Pizza']);
        //Create a topping
        $newTopping1 = factory(Topping::class, 1)->create(['name' => 'New topping 1']);

        $newTopping2 = factory(Topping::class, 1)->create(['name' => 'New topping 2']);

        $newTopping3 = factory(Topping::class, 1)->create(['name' => 'New topping 3']);

        $pizzaPie = Pizza::find($newPizza->id);

        //attach a topping
        $pizzaPie->toppings()->attach($newTopping1);
        $pizzaPie->toppings()->attach($newTopping2);
        $pizzaPie->toppings()->attach($newTopping3);

        $pizza_with_toppings = Pizza::where('id', '=', $newPizza->id)->with('toppings')->first();

        $this->assertTrue($pizza_with_toppings->toppings[0]->name === 'New topping 1');
        $this->assertTrue($pizza_with_toppings->toppings[1]->name === 'New topping 2');
        $this->assertTrue($pizza_with_toppings->toppings[2]->name === 'New topping 3');

        $this->assertTrue(count($pizza_with_toppings->toppings) === 3);

        $this->assertFalse($pizza_with_toppings->toppings[0]->name === 'Old topping');

    }


}
