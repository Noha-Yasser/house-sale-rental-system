<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bookings= Booking::with(['customer','property'])->orderBy('id','desc')->paginate(10);
        return response()->view('dashboard.booking.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    $customers = Customer::all();
    $properties = Property::all();
        return response()->view('dashboard.booking.create', compact('customers','properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $validator = Validator::make($request->all(), [
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'status' => 'required|string',
            'note' => 'nullable|string',
            'customer_id' => 'required|exists:customers,id',
            'property_id' => 'required|exists:properties,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }

        $booking = new Booking();
        $booking->booking_date = $request->booking_date;
        $booking->booking_time = $request->booking_time;
        $booking->status = $request->status;
        $booking->note = $request->note;
        $booking->customer_id = $request->customer_id;
        $booking->property_id = $request->property_id;

        $booking->save();

        return response()->json([
            'icon' => 'success',
            'title' => 'Created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $booking = Booking::with(['customer','property'])->findOrFail($id);
        return response()->view('dashboard.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
       $booking = Booking::findOrFail($id);
        return response()->view('dashboard.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
         $validator = Validator::make($request->all(), [
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'status' => 'required|string',
            'note' => 'nullable|string',
            'customer_id' => 'required|exists:customers,id',
            'property_id' => 'required|exists:properties,id',
        ]);

        if (!$validator->fails()) {
            $booking = Booking::findOrFail($id);

            $booking->booking_date = $request->booking_date;
            $booking->booking_time = $request->booking_time;
            $booking->status = $request->status;
            $booking->note = $request->note;
            $booking->customer_id = $request->customer_id;
            $booking->property_id = $request->property_id;

            $booking->save();

            return ['redirect' => route('bookings.index')];
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
         Booking::destroy($id);
    }
    }
