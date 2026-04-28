<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $countries=country::withCount('cities')->orderBy('id','desc')->paginate(10);
        return response()->view('dashboard.country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('dashboard.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator=Validator($request->all(),
        [
            'country_name'=>'required|string|min:3|max:20',
            'code'=>'required|digits:4',],[
            // 'country_name.required'=>'هذا الحقل مطلوب',
            // 'code.required'=>'هذا الحقل مطلوب',
            'country_name.min'=>"لا يقبل أقل من3  حروف "
            ]);

         if ($validator->fails()){
         return response()->json([
         'icon'=>'error','title'=>$validator->getMessageBag()->first(),
         ],400);
         }
         else{
        $countries=new Country();
        $countries->country_name=$request->get('country_name');
         $countries->code=$request->input('code');
         $isSaved=$countries->save();
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
        //
        $countries=Country::FindOrFail($id);
        return response()->view('dashboard.country.show',compact('countries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $countries=Country::findOrFail($id);
        return response()->view('dashboard.country.edit',compact('countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $validator=validator($request->all(),[
            'country_name'=>'required|string|min:3',
            'code'=>'required|numerics|digits:4'
        ]);

        if(! $validator->fails()){
            $countries=Country::findOrFail($id);
            $countries->country_name=$request->get('country_name');
            $countries->code=$request->get('code');

            $isUpdated=$countries->save();
            return ['redirect'=>route('countries.index')];
            //  return response()->json([
            //     'icon'=>'success',
            //     'title'=>'Updated is successfully'
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
        //
        $countries=Country::destroy($id);
    }
       public function trashed()
    {
        //
        $countries=Country::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return response()->view('dashboard.country.trashed',compact('countries'));
    }

           public function restore($id)
    {

        $countries=Country::onlyTrashed()->findOrFail($id)->restore();
       return back()->with('success','Success');
    }

        public function force($id)
    {

        $countries=Country::onlyTrashed()->findOrFail($id)->forceDelete();
       return back()->with('success','Success');
    }

}
