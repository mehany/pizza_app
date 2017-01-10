<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topping;
use App\Http\Requests\ToppingRequest;


class ToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Topping::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return create view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToppingRequest $request)
    {
        if($request->has('topping'))
            $data = $request->get('topping');
        else
            $data = $request->input();

        $topping = Topping::create($data);

        if($request->wantsJson()){
            return response()->json($topping);
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
    public function show($id, Request $request)
    {
        $topping = Topping::findOrFail($id);

        if($request->wantsJson()){
            return response()->json($topping);
        }else{
            // return view
        }
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
        if(Topping::destroy($id)){
            return response()->json([ "status" => 200 ]);
        }else{
            return response()->json([ "status" => 200 , "message" => "Entity with id " . $id . "does not exist or has been deleted."]);
        };
    }
}
