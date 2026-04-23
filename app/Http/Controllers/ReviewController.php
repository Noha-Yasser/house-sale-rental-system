<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Property;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::OrderBy('property_id','desc')->paginate(10);
        return response()->view('dashboard.review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties=Property::all();
        return response()->view('dashboard.review.create',compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validator=validator($request->all(),[
            'comments'=>'required|string|max:40|min:3',
            'property_id'=>'required',
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
    public function show($id)
    {
        $reviews = Review::findOrFail($id);
         return response()->view('dashboard.review.show',compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reviews = Review::findOrFail($id);
        $properties=Property::all();
        return response()->view('dashboard.review.edit',compact('properties' , 'reviews'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator=validator($request->all(),[
            'comments'=>'required|string|max:40|min:3',
            'property_id'=>'required',
        ]);

        if(! $validator->fails()){
            $reviews=Review::findOrFail($id);
            $reviews->comments=$request->get('comments');
            $reviews->property_id=$request->get('property_id');

            $isUpdated=$reviews->save();

             return['redirect'=>route('reviews.index')];
            // return response()->json([
            //     'icon'=>'success',
            //     'title'=>'Created New Review is Successfully'
            // ],200);
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
        $reviews = Review::destroy($id);
    }
}
