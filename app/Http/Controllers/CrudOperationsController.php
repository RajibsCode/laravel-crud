<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\CrudOperations;
class CrudOperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //13. index view
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 3. data from db and set in compact()
        $countries = Country::all();
        // 2. return register page view
        return view('registration',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //8. ignore tokeen and submit button data
        $requestData = $request->except(['_token','regist']);

        // 1. random image name set for img input
        $imgName = 'lv_' . rand() . '.' . $request->profile->extension();
        // 2. move upload file in public folder
        $request->profile->move(public_path('images/user/'),$imgName);
        $requestData['profile'] = $imgName;// for img name store in db

        //11. create() use
        $store = CrudOperations::create($requestData);
        //14. redirect after form submit
        return redirect()->route('crud.index')->with('success','User Added Successfully');// 17. use with() for set flash message

        // 7.check form
        // echo "<pre>";
        // print_r($store);
        // exit();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrudOperations  $crudOperations
     * @return \Illuminate\Http\Response
     */
    public function show(CrudOperations $crudOperations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrudOperations  $crudOperations
     * @return \Illuminate\Http\Response
     */
    public function edit(CrudOperations $crudOperations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrudOperations  $crudOperations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CrudOperations $crudOperations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrudOperations  $crudOperations
     * @return \Illuminate\Http\Response
     */
    public function destroy(CrudOperations $crudOperations)
    {
        //
    }
}
