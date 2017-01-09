<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\Http\Requests\PizzaRequest;
use App\Topping;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Pizza::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PizzaRequest $request)
    {
        // return a view otherwise 200
        return Response::json(200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaRequest $request)
    {
        if($request->has('pizza'))
            $data = $request->get('pizza');
        else
            $data = $request->input();

        $pizza = Pizza::create($data);

        if($request->wantsJson()){
            return response()->json($pizza);
        }else{
            // return view
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pizza = Pizza::findOrFail($id);

        return response()->json($pizza);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Add a topping to a pizza.
     *
     * @param  int  $pizza_id
     * @return \Illuminate\Http\Response
     */
    public function addToppings($pizza_id, Request $request)
    {
        //
        $toppings = $request->input();
        $pizza = Pizza::findOrFail($pizza_id);

        foreach($toppings as $topping){
            $is_valid_toping = Topping::find($topping['topping_id']);
            if($is_valid_toping){
                $pizza->toppings()->detach($is_valid_toping->toArray());
                $pizza->toppings()->attach($is_valid_toping->toArray());
            }
        }

        return response()->json($pizza->load('toppings'));

    }

    /**
     * Get a list of pizza toppings.
     *
     * @param  int  $pizza_id
     * @return \Illuminate\Http\Response
     */
    public function getToppings($pizza_id)
    {
        //
        $pizza = Pizza::find($pizza_id);
        if(!$pizza)
            return response()->json('Model not found');

        return response()->json($pizza->load('toppings'));

    }
}


