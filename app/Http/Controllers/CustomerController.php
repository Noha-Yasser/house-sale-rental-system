<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    {$countries = Country::all();
        $cities= City::all();
        return response()->view('dashboard.customer.create',compact('cities','countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|min:3|max:50',
            'email'       => 'required|email|unique:customers,email', 
            'password'    => 'required|string|min:6',
            'phone'       => 'required|digits:10',
            'city_id'     => 'required|exists:cities,id',
            'gender'      => 'required|string',
            'birthday'    => 'required|date',
            'identity_id' => 'required|string',
            'address'     => 'required|string|max:255',
        ], [
           
            'name.required' => 'يجب إدخال اسم الزبون',
            'phone.digits'  => 'رقم الهاتف يجب أن يتكون من 10 أرقام فقط',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon'  => 'error',
                'title' => $validator->getMessageBag()->first()
            ], 400);
        }

       
        $customer = new Customer();
        $customer->email       = $request->get('email');
        $customer->password    = Hash::make($request->get('password')); 
        $customer->gender      = $request->get('gender');
        $customer->birthday    = $request->get('birthday');
        $customer->identity_id = $request->get('identity_id');
        
        $isSaved = $customer->save();

        if ($isSaved) {
            
            $user = new User();
                if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/customer', $imageName);
                $user->image = $imageName;
            }
            $user->name    = $request->get('name');
            $user->phone   = $request->get('phone');
            $user->address = $request->get('address');
            $user->city_id = $request->get('city_id');
            
            
            $user->actor()->associate($customer);
            
            $isUserSaved = $user->save();

            if ($isUserSaved) {
                return response()->json([
                    'icon'  => 'success',
                    'title' => 'تم إنشاء حساب الزبون بنجاح'
                ], 200);
            } else {
                
                $customer->delete();
            }
        }

        return response()->json([
            'icon'  => 'error',
            'title' => 'فشلت عملية الحفظ، حاول مرة أخرى'
        ], 500);
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
    {$countries = Country::all();
           $cities= City::all();
           $customers=Customer::findOrFail($id);
           return response()->view('dashboard.customer.edit',compact('customers','cities','countries'));
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
                  if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/customer', $imageName);
                $users->image = $imageName;
            }
                $users->name=$request->get('name');
                 $users->phone=$request->get('phone');
             $users->address=$request->get('address');
                 $users->city_id=$request->get('city_id');
                 
                     $users->actor()->associate($customers);
             $isSaved=$users->save();
             return response()->json(['redirect'=>route('customers.index')]);
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