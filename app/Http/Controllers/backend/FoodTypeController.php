<?php

namespace App\Http\Controllers\backend;

use App\FoodType;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class FoodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurant = Restaurant::findOrFail($request->restaurant);
        return view('backend.foodType.list_foodTypes',compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $restaurant = Restaurant::findOrFail($request->restaurant_id);
        return view('backend.foodType.create_foodType',compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'restaurant_id',
            'type_name',
        ]);

        $foodType = FoodType::create([
            'restaurant_id' => $request->restaurant_id,
            'type_name' => $request->type_name,
        ]);

        return response()->json(['message' => 'success','foodType' => $foodType ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FoodType  $foodType
     * @return \Illuminate\Http\Response
     */
    public function show(FoodType $foodType,Request $request)
    {
        //return $foodType;
        return view('backend.foodType.view_type_food',compact('foodType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FoodType  $foodType
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodType $foodType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FoodType  $foodType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodType $foodType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FoodType  $foodType
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodType $foodType)
    {
        //
    }
}
