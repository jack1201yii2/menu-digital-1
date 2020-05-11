<?php

namespace App\Http\Controllers\backend;

use App\BranchOffice;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class BranchOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branch_offices = BranchOffice::where('restaurant_id',$request->restaurant)->get();
        $restaurant = Restaurant::findOrFail($request->restaurant);
        //return $restaurant_users;
        return view('backend.branch_offices.list_branch_offices',compact('branch_offices','restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $restaurant = Restaurant::findOrFail($request->restaurant);
        return view('backend.branch_offices.create_branch_office',compact('restaurant'));
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
            'branch_office_name' => 'required',
            'restaurant_id' => 'required'
        ]);

        $branchOffice = BranchOffice::create($request->all());
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function show(BranchOffice $branchOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchOffice $branchOffice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BranchOffice $branchOffice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchOffice $branchOffice)
    {
        //
    }
}
