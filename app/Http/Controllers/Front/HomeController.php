<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Contact;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
  $properties = Property::take(4)->orderBy('id','desc')->get();
return view('front.home',compact('properties'));

    }
public function about(){
      $footerImage = asset('front/img/logo.svg');
return view('front.about',compact('footerImage'));

    }
    public function shop(){
          $properties = Property::take(6)->get();
return view('front.shop',compact('properties'));

    }
 public function payment(){
        return view('front.payment');
    }
    public function login(){
        return view('front.login');
    }
    public function showContact(){
        return view('front.contact');
    }
   
    public function addHome(){
        return view('front.addHome');
    }  
     public function adminProfile(){
        return view('front.adminProfile');
    }   
    public function companyProfile(){
        return view('front.companyProfile');
    }  
     public function customerProfile(){
        return view('front.customerProfile');
    }   
    public function register(){
        return view('front.register');
    }




      public function home1($id){
          $properties = Property::with(['company',  'reviews'  ,     // جلب الشركة المرتبطة بالعقار
        'company.user','city', 'images', 'primaryImage'])->withCount('reviews')->findOrFail($id);
    
        return view('front.home1',compact('properties'));
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
