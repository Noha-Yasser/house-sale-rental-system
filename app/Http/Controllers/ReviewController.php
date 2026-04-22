<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
       //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $properties=Property::findOrFail($id);
        return response()->view('dashboard.review.create',compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validator=validator($request->all(),[
            'comments'=>'required',
            'property_id'=>'nullable',
        ]);

        if(! $validator->fails()){
            $reviews=new Review();
            $reviews->comments=$request->get('comments');
            $reviews->property_id=$request->get('property_id');

            $isSaved=$reviews->save();
            return response()->json([
                'icon'=>'success',
                'title'=>'Created New Review is Successfully'
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
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reviews $reviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reviews $reviews)
    {
        //
    }
}
