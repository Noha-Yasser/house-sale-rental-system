<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Company;
use App\Models\City;
use App\Models\Country;
use App\Models\PropertyImage;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::withCount('reviews')->orderBy('id','desc')->paginate(10);
        return response()->view('dashboard.property.index',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $cities = City::all();
         $countries = Country::all();
         return response()->view('dashboard.property.create',compact('companies','countries','cities'));    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=validator($request->all(),[
            'company_id' => 'required',
            'title' => 'required|string|max:30|min:3',
            'description' => 'required|string|max:100|min:3',
            'price' => 'required',
            'area' => 'required|numeric',
            'type' => 'required|string',
            'bedrooms' => 'nullable|numeric',
            'bathrooms' => 'nullable|numeric',
            'address' => 'nullable|string|max:30|min:3',
            'zip_code' => 'required|digits:4',
            'status' => 'required',
            'city_id' => 'required|exists:cities,id',
        
        ]);

        if(! $validator->fails()){
            $properties = new Property();
            $properties->company_id = $request -> get('company_id');
            $properties->title = $request -> get('title');
            $properties->description = $request -> get('description');
            $properties->price = $request -> get('price');
            $properties->type = $request -> get('type');
            $properties->bedrooms = $request -> get('bedrooms');
            $properties->area = $request -> get('area');
            $properties->bathrooms = $request -> get('bathrooms');
            $properties->address = $request -> get('address');
            $properties->city_id = $request -> get('city_id');
            $properties->zip_code = $request -> get('zip_code');
            $properties->status = $request -> get('status');
         $properties->services = $request->get('services') ?? '';
$properties->unique_feature = $request->get('unique_feature') ?? '';
 if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $imageName = time() . 'impage.' . $photo->getClientOriginalExtension();
                $photo->move('storage/images/proparty', $imageName);
                $properties->photo = $imageName;
            }
    $properties->views_count = 0; 
            $isSaved = $properties -> save();
                // if ($request->hasFile('images')) {
                //     foreach ($request->file('images') as $index => $image) {
                //         $imageName = time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                //         $image->move(public_path('storage/properties'), $imageName);
                        
                //         PropertyImage::create([
                //             'property_id' => $properties->id,
                //             'image_path' => $imageName,
                //             'is_primary' => ($index === 0) 
                //         ]);
                //     }
                // }
            return response()->json([
                'icon'=>'success',
                'title'=>'Created Property is Successfully',
            ],200);


        }else{
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
          $properties = Property::findOrFail($id);
         return response()->view('dashboard.property.show',compact('properties'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $properties = Property::findOrFail($id);
        $companies = Company::all();
        $cities = City::all();
         $countries = Country::all();
         return response()->view('dashboard.property.edit',compact('properties','companies','cities','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validator=validator($request->all(),[
            'company_id' => 'required',
            'title' => 'required|string|max:30|min:3',
            'description' => 'required|string|max:100|min:3',
            'price' => 'required',
            'area' => 'required|numeric',
            'type' => 'required|string',
            'bedrooms' => 'nullable|numeric',
            'bathrooms' => 'nullable|numeric',
            'address' => 'nullable|string|max:30|min:3',
            'zip_code' => 'required|digits:4',
            'status' => 'required',
            'city_id' => 'required|exists:cities,id',
        
        ]);

        if(! $validator->fails()){
            $properties = Property::findOrFail($id);
            $properties->company_id = $request -> get('company_id');
            $properties->title = $request -> get('title');
            $properties->description = $request -> get('description');
            $properties->price = $request -> get('price');
            $properties->type = $request -> get('type');
            $properties->bedrooms = $request -> get('bedrooms');
            $properties->area = $request -> get('area');
            $properties->bathrooms = $request -> get('bathrooms');
            $properties->address = $request -> get('address');
            $properties->city_id = $request -> get('city_id');
            $properties->zip_code = $request -> get('zip_code');
            $properties->status = $request -> get('status');
         $properties->services = $request->get('services') ?? '';
$properties->unique_feature = $request->get('unique_feature') ?? '';

    $properties->views_count = 0; 
 if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $imageName = time() . 'impage.' . $photo->getClientOriginalExtension();
                $photo->move('storage/images/proparty', $imageName);
                $properties->photo = $imageName;
            }
            $isUpdated = $properties -> save();

                // if ($request->hasFile('images')) {
                //     foreach ($request->file('images') as $index => $image) {
                //         $imageName = time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                //         $image->move(public_path('storage/properties'), $imageName);
                        
                //         PropertyImage::create([
                //             'property_id' => $properties->id,
                //             'image_path' => $imageName,
                //             'is_primary' => false
                //         ]);
                //     }
                // }
                    return response()->json(['redirect'=>route('properties.index')]);


        }else{
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
        $properties = Property::destroy($id);
    }


    public function destroyImage($id)
{
    $image = PropertyImage::findOrFail($id);
    
   
   $imagePath = public_path('storage/properties/' . $image->image_path);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    
   
    $image->delete();
    
    return response()->json(['success' => true]);
}
}
