<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bookings= Booking::orderBy('id','desc')->paginate(10);
        return response()->view('dashboard.booking.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('dashboard.booking.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator=validator($request->all(),[
            'satus' =>'required',
            'booking_date' =>'required',
            'booking_time' =>'required',
           'note' =>'nullable',
        ]);
        if(! $validator->fails()){
            $bookings=new Booking();
            $bookings->booking_time=$request->get('booking_time');
            $bookings->booking_date=$request->get('booking_date');
            $bookings->status=$request->get('status');
            $bookings->note=$request->get('note');
            $bookings->customer_id=$request->get('customer_id');
            $bookings->proparty_id=$request->get('proparty_id');

            $isSaved=$bookings->save();
            return response()->json([
                'icon'=>'success',
                'title'=>'Booking is created Successfully'
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
         $customers = Customer::all();
          $proparites= proparty::all();
       $companies=Company::findOrFail($id);
        return response()-> view('dashboard.company.edit', compact('companies','cities','countries'));   }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $bookings=Booking::destroy($id);
    }}

