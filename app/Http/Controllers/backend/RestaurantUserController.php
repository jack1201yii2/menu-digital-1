<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\RestaurantUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RestaurantUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $restaurant_users = RestaurantUser::where('restaurant_id',$request->restaurant)->get();
        $branchOffice_users = [];
        if(auth()->user()->branch_office_id == null){
            $branchOffice_users = User::where('branch_office_id',$request->restaurant)->get();

        }


        $restaurant = Restaurant::findOrFail($request->restaurant);
        //return $restaurant_users;
        return view('backend.users.list_users',compact('restaurant_users','restaurant','branchOffice_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $restaurant = Restaurant::findOrFail($request->restaurant);
        return view('backend.users.create_user',compact('restaurant'));
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
            'user_name' => 'required',
            'user_nickname' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $request['password'] = Hash::make($request->password);

        $user = User::create($request->all());

        if(isset($request->restaurant_id) && $user->branch_office_id == null){
            $restaurantUser = RestaurantUser::create([
                'restaurant_id' => $request->restaurant_id,
                'user_id' => $user->id
            ]);
        }

        return redirect('admin/restaurant-users?restaurant='.$request->restaurant_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RestaurantUser  $restaurantUser
     * @return \Illuminate\Http\Response
     */
    public function show(User $restaurantUser)
    {
        return view('backend.users.view_user',compact('restaurantUser'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RestaurantUser  $restaurantUser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,User $restaurantUser)
    {
        $restaurant = Restaurant::findOrFail($request->restaurant_id);
        //return $restaurantUser;
        return view('backend.users.edit_user',compact('restaurantUser','restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RestaurantUser  $restaurantUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $restaurantUser)
    {
        if (isset($request->password)) {
            $request['password'] = Hash::make($request->password);
        }
        $restaurantUser->fill(array_filter($request->only('user_restaurant_name','nick_name','email','password','branch_office_id')));
        if ($restaurantUser->isClean()) {
            //alert()->info('Información','Para actualizar cambie algun dato');
            return back();
        }else{
            $restaurantUser->save();
            return redirect('admin/restaurant-users?restaurant='.$request->restaurant_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RestaurantUser  $restaurantUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantUser $restaurantUser)
    {
        //
    }
}
