

@extends('front.parent')
@section('title','Home1')
@section('styles')


    <link rel="stylesheet" href="{{ asset('front/css/home1style.css') }}">
  @endsection
@section('content')

    <section class="sec1">
  
     
<div class="par">
    <div class="chi">
       
    @foreach($properties->images as $image)
 
        <img src="{{ asset('images/property/' . $image->image_path) }}" 
             alt="Property Image"  >
    @endforeach

    </div>
    {{-- 
            $table->string('description');
        
            $table->string('type');
            
         
           $table->integer('views_count')->default(0);
        
          
            $table->string('zip_code');
            $table->string('status');
       
            $table->string('services')->nullable();
            $table->string('unique_feature')->nullable(); --}}

</div></section>
<section class="first">
<div class="firstl">
    <div style="display: block;">
                              <div class="sec2">
                                       
                                               <div style="float:left; margin-top: 10px;" >
                                                             <div class="divttxt">
                                                                     <h1>{{ $properties->title ?? "" }}</h1>
                                                                     <p>{{ $properties->address ?? ""}}</p>
                                                                     <h3>{{ $properties->city->street ?? 'No street address' }}</h3>
                                                             </div>
                                                         <div class="rev">
                                                            <i class="fa fa-star checked"></i>
                                                            <i class="fa fa-star checked"></i>
                                                            <i class="fa fa-star checked"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i> 
                                                            <h4>3.8</h4>
                                                            <a href="#reviews">({{$properties ->reviews_count}} reviews)</a> 
                                                         </div>
                                                </div>
                                              <div style="float:right">
                                                 <img style="width: 250px; height:125px;margin-top: 35px; margin-left: 50px;" src="{{ asset('storage/images/company/' . $properties->company->user->image) }}" alt="gsc">  
                                             </div>
                                            </div>
                                    </div>



<div class="sec3">

    <table class="tab">
        <tr>
          <td> 
                <p>Type</p>
                <h2>{{ $properties->type }}</h2>
            </td>
            <td> 
                <p> Monthly Rent</p>
                <h2>${{ $properties->price }}</h2>
            </td>
            <td> 
                <p> Bedrooms</p>
                <h2>{{ $properties->bedrooms }} bd</h2> 
            </td>
            <td> 
                <p> Bathrooms</p>
                <h2>{{ $properties->bathrooms }}ba</h2>
            </td>
            <td> 
                <p> Square Feet</p>
                <h2>{{ $properties->area }} sq ft</h2>
            </td>
        </tr>
    </table>

</div>

</div>

<div class="firstr">
    <h2>
        Contact This Property
    </h2>
    <h4>
        Tour Options: In-Person
    </h4>
    <button class="bt1" onclick="window.location.href='{{ route('payment.page')}}';">Buy Now</button><br>
    <button class="bt2"><a href="whatsapp.com">Send Message</a></button><br> 
    <i class="fa fa-phone fa-1x "  style="display: inline-block;"></i>
    <h3 style="display: inline-block;">  {{ $properties->company->user->phone }}</h3><br>
    <i class="fa fa-globe" style="color: #1f5131; display: inline-block;"></i>
    <h3 style="display: inline-block;"> Language: English and Spanish</h3><br>
    <i class="fa fa-clock-o fa-1x"style="color: #1f5131; display: inline-block;"></i>
    <h3 style="display: inline-block;"> Open 8:30am - 5pm Today</h3>
</div>
</section> 


<section class="second">
   <h1>About {{ $properties->title ?? "" }}</h1>
   <p>Welcome to {{ $properties->title ?? "" }} Apartments in Las Vegas, where apartment living is no illusion! We have the lifestyle you're looking for - comfort and convenience in the heart of Las Vegas. Within our lush grounds you'll find grassy courtyards, grilling areas, a playground and two sparkling swimming pools with free Wi-Fi. Our spacious one and two-bedroom apartment homes offer features such as fireplaces, balconies, washers/dryers and wet bars. Pets are welcome and covered parking is available. Find all of this at {{ $properties->title ?? "" }} Apartments in Las Vegas, right where you want to be!
   {{ $properties->description ?? "" }}
    <br><br>
   {{ $properties->title ?? "" }} is an apartment community located in <b> Clark County</b> and the<b>89103</b>  ZIP Code. This area is served by the<b> Clark County</b> attendance zone.</p>
    <h2>Unique Features</h2> {{ $properties->unique_feature ?? "" }}
    <ul>
    <div>
<div style="float: left;">
<li> 3 Miles to the Strip</li>
<li>Abundant Storage</li>
<li>Casino/ Mountain Views</li>
<li>Ceiling Fan(s)</li>
<li>Courtyard View*</li>
<li>Dishwasher</li>
<li>Enormous Kitchen Pantry</li>
<li>Exterior Storage</li>
<li>Faux Wood Blinds</li>
<li>Fireplace*</li>
</div>
<div style="float: left;">
    <li> Gated Community</li>
    <li>In Home Wifi Ready, By Cox Cable</li>
    <li>Indoor Whirlpool Spa</li>
    <li>Kitchen Pantry</li>
    <li>Microwave</li>
    <li>Nearby Shopping</li>
    <li>Open Kitchen</li>
    <li>Park Area with Barbeque</li>
    <li>Pet Friendly</li>
    <li>Pool View*</li>
    </div>
    <div style="float: left;">
        <li> Reserved Carport</li>
        <li>Stainless Steel Appliances</li>
        <li>Two Lighted Tennis Courts</li>
        <li>Vanity Area</li>
        <li>Walk-in Closet(s)</li>
        <li>Washer/Dryer Included</li>
        <li>Wet Bar*</li>
        <li>Wood-Style Flooring</li>
        <li>X-Large Patio/Balcony</li>
       
        </div>

    </div>
</ul>
</section>
<section class="thrid">
<h1 style="font-family: CostarBrownRegular;color: rgb(65, 68, 68);">Community Amenities</h1>
<table>
    <tr>
        <td>
            <img src="{{ asset('front/img/swimming.png') }}" style="width: 100px; height: 100px;" alt="icon">
            <h3>Pool</h3>
        </td>
        <td>
            <img src="{{ asset('front/img/gym.png') }}" style="width: 100px; height: 100px;" alt="icon">
            <h3>Fitness Center</h3>
        </td>
        <td>
            <img src="{{ asset('front/img/playground.png') }}" style="width: 100px; height: 100px;" alt="icon">
            <h3>Playground</h3>
        </td>
        <td>
            <img src="{{ asset('front/img/club.png') }}" style="width: 100px; height: 100px;" alt="icon">
            <h3>Clubhouse</h3>
        </td>
    </tr>
    <tr>
        <td>
            <img src="{{ asset('front/img/access-control.png') }}" style="width: 100px; height: 100px;" alt="icon">
            <h3>Controlled Access</h3>
        </td>
        <td>
            <img src="{{ asset('front/img/recycle.png') }}" style="width: 100px; height: 100px;" alt="icon">
            <h3>Recycling</h3>
        </td>
        <td>
            <img src="{{ asset('front/img/bbq.png') }}" style="width: 100px; height: 100px;" alt="icon">
            <h3>Grill</h3>
        </td>
        <td>
            <img src="{{ asset('front/img/gate.png') }}" style="width: 100px; height: 100px;" alt="icon">
            <h3>Gated</h3>
        </td>
    </tr>
</table>
<h1 style="font-family: CostarBrownRegular;color: rgb(65, 68, 68);">Property Services</h1>{{ $properties->services ?? "" }}
<ul>
    <div>
<div style="float: left;">
<li> Wi-Fi at Pool and Clubhouse</li>
<li>Controlled Access</li>
<li>Maintenance on site</li>

</div>
<div style="float: left;">
    <li>Property Manager on Site</li>
    <li> 24 Hour Availability</li>
    <li> Recycling</li>
   
    </div>
    <div style="float: left;">
        <li>Online Services</li>
        <li>Planned Social Activities</li>
        <li>Public Transportation</li>
        </div>

    </div>
</ul>
</section>
<section class="thrid">
    <h1 style="font-family: CostarBrownRegular;color: rgb(65, 68, 68);">Apartment Features</h1>
    <table>
        <tr>
            <td>
                <img src="{{ asset('front/img/drying.png') }}" style="width: 100px; height: 100px;" alt="icon">
                <h3>Washer/Dryer</h3>
            </td>
            <td>
                <img src="{{ asset('front/img/air-conditioner.png') }}" style="width: 100px; height: 100px;" alt="icon">
                <h3>Air Conditioning</h3>
            </td>
            <td>
                <img src="{{ asset('front/img/dishwasher.png') }}" style="width: 100px; height: 100px;" alt="icon">
                <h3>Dishwasher</h3>
            </td>
            <td>
                <img src="{{ asset('front/img/speedometer.png') }}" style="width: 100px; height: 100px;" alt="icon">
                <h3>High Speed Internet Access</h3>
            </td>
        </tr>
        <tr>
            <td>
                <img src="{{ asset('front/img/clothes-hanger.png') }}" style="width: 100px; height: 100px;" alt="icon">
                <h3>Walk-In Closets</h3>
            </td>
            <td>
                <img src="{{ asset('front/img/countertop.png') }}" style="width: 100px; height: 100px;" alt="icon">
                <h3>Granite Countertops</h3>
            </td>
            <td>
                <img src="{{ asset('front/img/grass.png') }}" style="width: 100px; height: 100px;" alt="icon">
                <h3>Yard</h3>
            </td>
            <td>
                <img src="{{ asset('front/img/microwave.png') }}" style="width: 100px; height: 100px;" alt="icon">
                <h3>Microwave</h3>
            </td>
        </tr>
    </table>
    <h1 style="font-family: CostarBrownRegular;color: rgb(65, 68, 68);">Highlights</h1>
    <ul>
        <div>
    <div style="float: left;">
    <li> High Speed Internet Access</li>
    <li>Wi-Fi</li>
    <li>Washer/Dryer</li>
    
    </div>
    <div style="float: left;">
        <li>Air Conditioning</li>
        <li> Heating</li>
        <li> Ceiling Fans</li>
        <li> Cable Ready</li>
        </div>
        <div style="float: left;">
            <li>Storage Units</li>
            <li>Tub/Shower</li>
            <li>Fireplace</li>
            </div>
    
        </div>
    </ul>
    </section>
    <section class="fourth">
     <h1 style="font-family: CostarBrownRegular;color: rgb(65, 68, 68);">Location</h1>  
        <p><b>Property Address:</b>{{ $properties->address ?? ""}}</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3223.1986812506893!2d-115.19650507517723!3d36.11301707245092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c699eb22d393%3A0x757c432c0eb937b5!2zNDI1MCBTIEFydmlsbGUgU3QsIExhcyBWZWdhcywgTlYgODkxMDPYjCDYp9mE2YjZhNin2YrYp9iqINin2YTZhdiq2K3Yr9ip!5e0!3m2!1sar!2s!4v1688481005714!5m2!1sar!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
    </section>
    <h1 id="reviews" style="text-align: center; font-family: CostarBrownRegular;color: rgb(65, 68, 68);">Property Ratings at {{ $properties->title ?? "" }}
    </h1>
    <section id="fiv">
           @foreach($properties->reviews as $review)
        <div class="one" style="float: left;">
            <div class="rev">
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star  checked" ></i>
                <i class="fa fa-star checked"></i> </div>
               <p>{{ $review->created_at }}</p> 
               <h2>	alexzander</h2>
               <p>{{ $review->comments }}</p>
                <a href="#" >Read More</a>
        </div>
       @endforeach
    </section>




@endsection
@section('scripts')
@endsection 