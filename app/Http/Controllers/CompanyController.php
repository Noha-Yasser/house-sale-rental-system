<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $companies = Company::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { $cities= City::all();
     $countries = Country::all();
       return response()->view('dashboard.company.create',compact('cities','countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'name' => 'required|string|min:3', 
        'email' => 'required|email|unique:companies,email',
        'city_id' => 'required|exists:cities,id',
      
    ]);

    if ($validator->fails()) {
        return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
    }

   
    $company = new Company();
    $company->email = $request->get('email');
    $company->password = Hash::make($request->get('password'));
    $company->website = $request->get('website');
    $company->rating = $request->get('rating', 0);
    
    $isSaved = $company->save();

    if ($isSaved) {
      
        $user = new User();
           if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/company', $imageName);
                $user->image = $imageName;
            }
        $user->name = $request->get('name'); 
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->city_id = $request->get('city_id');
        $user->actor()->associate($company); 
        $user->save();

        return response()->json(['icon' => 'success', 'title' => 'success store'], 200);
    }
}
    

    /**
     * Display the specified resource.
     */
public function show(string $id)
    {
        
      $companies=Company::findOrFail($id);
          return view('dashboard.company.show', compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(string $id)
    {  $countries = Country::all();
          $cities= City::all();
       $companies=Company::findOrFail($id);
        return response()-> view('dashboard.company.edit', compact('companies','cities','countries'));   }

    /**
     * Update the specified resource in storage.
     */

          public function update(Request $request, string $id)
{
    $validator = Validator($request->all(), [
        'name'        => 'required|string|max:100',
        'email'       => 'required|email|unique:companies,email,' . $id,
        'website'     => 'nullable|string|max:255', 
        'description' => 'nullable|string|max:1000',
         'address' => 'nullable|string',
        'rating'      => 'nullable|numeric|min:0|max:5',
        'city_id'     => 'required|exists:cities,id',
      
        'password'    => 'nullable|string|min:6', 
    ]);

  
  if(! $validator->fails()){
    $companies = Company::findOrFail($id);

  
    $companies->email       = $request->get('email');
    $companies->website     = $request->get('website');
    $companies->rating      = $request->get('rating');
    $companies->description = $request->get('description');

    $isSaved=$companies->save();
             if($isSaved){
                $users=$companies->user;
                 if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/company', $imageName);
                $users->image = $imageName;
            }
                $users->name=$request->get('name');
                 $users->phone=$request->get('phone');
             $users->address=$request->get('address');
                 $users->city_id=$request->get('city_id');
                 
                     $users->actor()->associate($companies);
             $isSaved=$users->save();
             return response()->json(['redirect'=>route('companies.index')]);
             }}
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
       $companies=Company::destroy($id);
}
}