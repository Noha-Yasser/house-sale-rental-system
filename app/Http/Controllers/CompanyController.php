<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;

use Dotenv\Validator;
use GrahamCampbell\ResultType\Success;
use Illuminate\Auth\Events\Validated;
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
       return response()->view('dashboard.company.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validator=Validator($request->all(),[
             'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
         
            'description' => 'nullable|string',
            'website' => 'nullable|url|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

       if(! $validator->fails()){
            $companies=new Company();
            $companies->email=$request->get('email');
            $companies->website=$request->get('website');
            $companies->rating=$request->get('rating');
            $companies->password=$request->get('password');
             $isSaved=$companies->save();
             if($isSaved){
                $users=new User();
              
                $users->name=$request->get('name');
                 $users->phone=$request->get('phone');
             $users->address=$request->get('address');
                 $users->city_id=$request->get('city_id');
                     $users->actor()->associate($companies);
             $isSaved=$users->save();
             return response()->json(['icon'=>'Success',
            'title'=>'Created Company is successfully', ],200);
             }}
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
        
      $companies=Company::findOrFail($id);
          return view('dashboard.company.show', compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(string $id)
    {    $cities= City::all();
       $companies=Company::findOrFail($id);
        return view('dashboard.company.edit', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  string $id)
    {
        $validator=Validator($request->all(),[
             'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
         
            'description' => 'nullable|string',
            'website' => 'nullable|url|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

       if(! $validator->fails()){
                $companies=Company::findOrFail($id);
            $companies->email=$request->get('email');
            $companies->website=$request->get('website');
            $companies->rating=$request->get('rating');
            $companies->password=$request->get('password');
             $isSaved=$companies->save();
             if($isSaved){
                $users=$companies->user;
              
                $users->name=$request->get('name');
                 $users->phone=$request->get('phone');
             $users->address=$request->get('address');
                 $users->city_id=$request->get('city_id');
                     $users->actor()->associate($companies);
             $isSaved=$users->save();
             return response()->json(['icon'=>'Success',
            'title'=>'Created Company is successfully', ],200);
             }
    } else{return response()->json([
            'icon'=>'error',
            'title'=>$validator->getMessageBag()->first()
        ],400);}}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
    {
       $companies=Company::destroy($id);
}
}