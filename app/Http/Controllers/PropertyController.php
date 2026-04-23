<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::withCount('reviews')->orderBy('id','desc')->paginate(12);
        return response()->view('dashboard.property.index',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return response()->view('dashboard.property.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=validator($request->all(),[
            'title' => 'required|string|max:30|min:3',
            'description' => 'required|string|max:100|min:3',
            'price' => 'required',
            'area' => 'required|numeric',
            'type' => 'required|string',
            'bedrooms' => 'nullable|numeric',
            'bathrooms' => 'nullable|numeric',
            'address' => 'nullable|string|max:30|min:3',
            'state' => 'nullable|string|max:30|min:3',
            'zip_code' => 'required|digits:4',
            'status' => 'required',
         
        ]);

        if(! $validator->fails()){
            $properties = new Property();
            $properties->title = $request -> get('title');
            $properties->description = $request -> get('description');
            $properties->price = $request -> get('price');
            $properties->type = $request -> get('type');
            $properties->bedrooms = $request -> get('bedrooms');
            $properties->area = $request -> get('area');
            $properties->bathrooms = $request -> get('bathrooms');
            $properties->address = $request -> get('address');
            $properties->state = $request -> get('state');
            $properties->zip_code = $request -> get('zip_code');
            $properties->status = $request -> get('status');
         $properties->services = $request->get('services') ?? '';
$properties->unique_feature = $request->get('unique_feature') ?? '';
$properties->photo = $request->get('photo') ?? '';
    $properties->views_count = 0; 
            $isSaved = $properties -> save();
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $index => $image) {
                        $imageName = time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                        $image->move('storage/properties', $imageName);
                        
                        PropertyImage::create([
                            'property_id' => $properties->id,
                            'image_path' => $imageName,
                            'is_primary' => ($index === 0) 
                        ]);
                    }
                }
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
         return response()->view('dashboard.property.edit',compact('properties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validator=validator($request->all(),[
            'title' => 'required|string|max:30|min:3',
            'description' => 'required|string|max:100|min:3',
            'price' => 'required',
            'area' => 'required|numeric',
            'type' => 'required|string',
            'bedrooms' => 'nullable|numeric',
            'bathrooms' => 'nullable|numeric',
            'address' => 'nullable|string|max:30|min:3',
            'state' => 'nullable|string|max:30|min:3',
            'zip_code' => 'required|digits:4',
            'status' => 'required',
      
        ]);

        if(! $validator->fails()){
            $properties = Property::findOrFail($id);
            $properties->title = $request -> get('title');
            $properties->description = $request -> get('description');
            $properties->price = $request -> get('price');
            $properties->type = $request -> get('type');
            $properties->bedrooms = $request -> get('bedrooms');
            $properties->area = $request -> get('area');
            $properties->bathrooms = $request -> get('bathrooms');
            $properties->address = $request -> get('address');
            $properties->state = $request -> get('state');
            $properties->zip_code = $request -> get('zip_code');
            $properties->status = $request -> get('status');
            $properties->photo = $request -> get('photo');

    if ($request->hasFile('new_images')) {
    foreach ($request->file('new_images') as $image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move('storage/properties', $imageName);
        
        PropertyImage::create([
            'property_id' => $properties->id,
            'image_path' => $imageName,
            'is_primary' => false  
        ]);
    }
}
            $isUpdated = $properties -> save();

              return['redirect'=>route('properties.index')];


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
    
   
    $imagePath = public_path('storage/properties/' . $image->image);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    
   
    $image->delete();
    
    return response()->json(['success' => true]);
}
}
