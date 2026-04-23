<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\User;
use Dotenv\Validator;
use GrahamCampbell\ResultType\Success;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins=Admin::orderBy('id','desc')->paginate(10);
        return response()->view('dashboard.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities= City::all();
        return response()->view('dashboard.admin.create',compact('cities'));
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
            $admins=new Admin();
            $admins->email=$request->get('email');
             $admins->password=$request->get('password');
             $isSaved=$admins->save();
             if($isSaved){
                $users=new User();

                 if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/admin', $imageName);
                $users->image = $imageName;
            }
                $users->name=$request->get('name');
                 $users->phone=$request->get('phone');
             $users->address=$request->get('address');
                 $users->city_id=$request->get('city_id');
                     $users->actor()->associate($admins);
             $isSaved=$users->save();
             return response()->json(['icon'=>'Success',
            'title'=>'Created Admin is successfully', ],200);
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
        
      $admins=Admin::findOrFail($id);
        return response()->view('dashboard.admin.show',compact('admins'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
           $cities= City::all();
           $admins=Admin::findOrFail($id);
           return response()->view('dashboard.admin.edit',compact('admins','cities'));
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
            $admins= Admin::findOrFail($id);
            $admins->email=$request->get('email');
            
             $isSaved=$admins->save();
             if($isSaved){
                $users=$admins->user;
                  if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/admin', $imageName);
                $users->image = $imageName;
            }
                $users->name=$request->get('name');
                 $users->phone=$request->get('phone');
             $users->address=$request->get('address');
                 $users->city_id=$request->get('city_id');
                     $users->actor()->associate($admins);
             $isSaved=$users->save();
             return ['redirect'=>route('admins.index')];
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
        $admins=Admin::destroy($id);
    }
}
