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
        // 1. use get() for catch users data 
        // 5. with() for show country
        $users = CrudOperations::with('getCountry')->get();
        

        // 2. check data catch or not
        // echo "<pre>";
        // print_r($users);
        // exit();

        //13. index view
        return view('index',compact('users'));
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
    public function show(CrudOperations $crud)//2. use $crud variable
    {

        // echo"<pre>";
        // print_r($crud->hobbies_arr);
        // exit;
        //4.fetch Country model for get countries and use compact()
        $countries = Country::all();
        // 3. return view
        return view('show',compact('countries','crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrudOperations  $crudOperations
     * @return \Illuminate\Http\Response
     */
    public function edit(CrudOperations $crud)//3. set $crud in head
    {
        //2. fetch country data and compact()
        $countries = Country::all();
        // 1. return view
        return view('edit',compact('countries','crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrudOperations  $crudOperations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CrudOperations $crud)
    {
        //6.set data which want to update
     $crud->first_name = $request->first_name ?? $crud->first_name;
     $crud->last_name = $request->last_name ?? $crud->last_name;
     $crud->email = $request->email ?? $crud->email;
     $crud->contact = $request->contact ?? $crud->contact;
     $crud->gender = $request->gender ?? $crud->gender;
     $crud->hobbies = $request->hobbies ?? $crud->hobbies;
     $crud->address = $request->address ?? $crud->address;
     $crud->country = $request->country ?? $crud->country;
     //9. condition for profile image update
     if (isset($request->profile)) {
        //random image name set for img input
        $imgName = 'lv_' . rand() . '.' . $request->profile->extension();
        //move upload file in public folder
        $request->profile->move(public_path('images/user/'),$imgName);
        $crud['profile'] = $imgName;// for img name store in db
     }
     $crud->save(); //7.use for update data

        //8. then redirect after update
        return redirect()->route('crud.index')->with('success','User Updated Successfully');
        
        // echo"<pre>";
        // print_r($crud);
        // exit;
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
