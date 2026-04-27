<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
return view('front.temp');

    }

    public function showContact(){
        return view('front.contact');
    }

     public function contactStore(Request $request)
    {
     

        $validator=validator($request->all(),[
            'first_name'=>'required',
            'phone'=>'nullable',
            'email'=>'required',
            'last_name'=>'nullable',
            'message'=>'required',
        ]);

        if(! $validator->fails()){
            $contacts=new Contact();
            $contacts->first_name=$request->get('first_name');
            $contacts->phone=$request->get('phone');
            $contacts->email=$request->get('email');
            $contacts->last_name=$request->get('last_name');
            $contacts->message=$request->get('message');
            $isSaved=$contacts->save();
            return response()->json([
                'icon'=>'success',
                'title'=>' Successfully'
            ],200);



        }
        else{
            return response()->json([
                'icon'=>'error',
                'title'=>$validator->getMessageBag()->first(),

            ],400);
        }
    }
    
}
