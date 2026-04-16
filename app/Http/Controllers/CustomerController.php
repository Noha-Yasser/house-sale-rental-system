<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=Customer::orderBy('id','desc')->paginate(10);
        return response()->view('dashboard.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities= City::all();
        return response()->view('dashboard.customer.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator($request->all(),[
            'name'=>'required|string|min:3|max:20',
            'phone'=>'required|digits:10',],[
            'name.required'=>'its required',
            'phone.required'=>'its required',
            'phone.min'=>"phone more than that"

        ]);
        if(! $validator->fails()){
            $customers=new Customer();
            $customers->email=$request->get('email');
             $customers->password=$request->get('password');
             $isSaved=$customers->save();
             if($isSaved){
                $users=new User();
              
                $users->name=$request->get('name');
                 $users->phone=$request->get('phone');
             $users->address=$request->get('address');
                 $users->city_id=$request->get('city_id');
                     $users->actor()->associate($customers);
             $isSaved=$users->save();
             return response()->json(['icon'=>'Success',
            'title'=>'Created Customer is successfully', ],200);
             }
        }

        else{return response()->json([
            'icon'=>'error',
            'title'=>$validator->getMessageBag()->first()
        ],400);}
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
      $customers=Customer::findOrFail($id);
        return response()->view('dashboard.customer.show',compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
           $cities= City::all();
           $customers=Customer::findOrFail($id);
           return response()->view('dashboard.customer.edit',compact('customers','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator=Validator($request->all(),[
            'name'=>'required|string|min:3|max:20',
            'phone'=>'required|digits:10'
     ,],[
            'name.required'=>'its required',
            'phone.required'=>'its required',
            'phone.min'=>"phone more than that"

        ]);
        if(! $validator->fails()){
            $customers= Customer::findOrFail($id);
            $customers->email=$request->get('email');
            
             $isSaved=$customers->save();
             if($isSaved){
                $users=$customers->user;
              
                $users->name=$request->get('name');
                 $users->phone=$request->get('phone');
             $users->address=$request->get('address');
                 $users->city_id=$request->get('city_id');
                     $users->actor()->associate($customers);
             $isSaved=$users->save();
             return ['redirect'=>route('customers.index')];
             }
        }

        else{return response()->json([
            'icon'=>'error',
            'title'=>$validator->getMessageBag()->first()
        ],400);}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customers=Customer::destroy($id);
    }
}