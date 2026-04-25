<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $transactions = Transaction::with('booking')
            ->orderBy('id','desc')
            ->paginate(10);

        return view('dashboard.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $bookings = Booking::all();
        return response()->view('dashboard.transaction.create', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $validator=Validator::make($request->all(),
        [
           'amount' => 'required|numeric',
           'payment_method' => 'required',
           'status' => 'required',
           'booking_id' => 'required|exists:bookings,id',
            ]);

         if ($validator->fails()){
         return response()->json([
         'icon'=>'error','title'=>$validator->getMessageBag()->first(),
         ],400);
         }
         else{
        $transactions=new Transaction();
        $transactions->payment_method=$request->get('payment_method');
         $transactions->status=$request->input('status');
         $transactions->amount=$request->input('amount');
         $transactions->booking_id = $request->booking_id;

         $isSaved=$transactions->save();

         return response()->json([
            'icon'=>'success',
            'title'=>'created is succesfully'
         ],200);
         }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
          $transactions = Transaction::findOrFail($id);
         return response()->view('dashboard.transaction.show',compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transactions = Transaction::findOrFail($id);
        $bookings = Booking::all();
         return response()->view('dashboard.transaction.edit',compact('transactions','bookings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validator=Validator($request->all(),
        [
           'amount' => 'required|numeric',
           'payment_method' => 'required',
           'status' => 'required',
           'booking_id' => 'required|exists:bookings,id',
            ]);

         if ($validator->fails()){
         return response()->json([
         'icon'=>'error','title'=>$validator->getMessageBag()->first(),
         ],400);
         }
         else{
        $transactions= Transaction::findOrFail($id);
        $transactions->payment_method=$request->get('payment_method');
         $transactions->status=$request->input('status');
         $transactions->amount=$request->input('amount');


         $isUpdated=$transactions->save();

         return ['redirect' => route('transactions.index')];

         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transactions = transaction::destroy($id);
    }
}
