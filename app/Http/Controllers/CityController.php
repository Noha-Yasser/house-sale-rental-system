<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cities=City::with('country')->orderBy('id','desc')->paginate(10);

        return response()->view('dashboard.city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $countries=Country::all();
        return response()->view('dashboard.city.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator=validator($request->all(),[
            'city_name'=>'required',
            'country_id'=>'nullable',
        ]);

        if(! $validator->fails()){
            $cities=new City();
            $cities->city_name=$request->get('city_name');
            $cities->street=$request->get('street');
            $cities->country_id=$request->get('country_id');

            $isSaved=$cities->save();
            return response()->json([
                'icon'=>'success',
                'title'=>'Created City is Successfully'
            ],200);



        }
        else{
            return response()->json([
                'icon'=>'error',
                'title'=>$validator->getMessageBag()->first(),

            ],400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $countries=Country::all();
        $cities=City::findOrFail($id);
        return response()->view('dashboard.city.edit',compact('cities','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $id)
    {
        //
            $validator=validator($request->all(),[
            'city_name'=>'required',
            'country_id'=>'nullable',
        ]);

        if(! $validator->fails()){
            $cities=City::findOrFail($id);
            $cities->city_name=$request->get('city_name');
            $cities->street=$request->get('street');
            $cities->country_id=$request->get('country_id');

            $isSaved=$cities->save();
            return['redirect'=>route('cities.index')];




        }
        else{
            return response()->json([
                'icon'=>'error',
                'title'=>$validator->getMessageBag()->first(),

            ],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $cities=City::destroy($id);
    }
}
