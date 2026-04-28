@extends('front.parent')
@section('title','Home1')
@section('styles')


    <link rel="stylesheet" href="{{ asset('front/css/home1style.css') }}">
  @endsection
@section('content')

    <section class="sec1">
<div class="par">
    <div class="chi">
       {{asset('storage/images/property/'. $property->photo ?? "")}}
        <img src="img/home1a.jpg" alt="h">
        <img src="img/home1b.jpg" alt="h">
        <img src="img/home1c.jpg" alt="h">
        <img src="img/home1d.jpg" alt="h">
        <img src="img/home1e.jpg" alt="h">
        <img src="img/home1f.jpg" alt="h">
        <img src="img/home1g.jpg" alt="h">
        <img src="img/home1j.jpg" alt="h">
        <img src="img/home1k.jpg" alt="h">

    </div>
    $table->string('title');
            $table->string('description');
            $table->decimal('price');
            $table->string('type');
            $table->integer('bedrooms')->nullable();
            $table->integer('area');
            $table->integer('bathrooms')->nullable();
           $table->integer('views_count')->default(0);
            $table->string('address')->nullable();
          
            $table->string('zip_code');
            $table->string('status');
            $table->string('photo')->nullable(); 
            $table->string('services')->nullable();
            $table->string('unique_feature')->nullable();

</div></section>
<section class="first">
<div class="firstl">
    <div style="display: block;">
                              <div class="sec2">
                                       
                                               <div style="float:left; margin-top: 10px;" >
                                                             <div class="divttxt">
                                                                     <h1>{{ $properties->title }}</h1>
                                                                     <p>{{ $properties->address }}</p>
                                                                     <h3>{{ $properties->address }}<</h3>
                                                             </div>
                                                         <div class="rev">
                                                            <i class="fa fa-star checked"></i>
                                                            <i class="fa fa-star checked"></i>
                                                            <i class="fa fa-star checked"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i> 
                                                            <h4>3.8</h4>
                                                            <a href="#reviews">(8 reviews)</a> 
                                                         </div>
                                                </div>
                                              <div style="float:right">
                                                 <img style="width: 250px; height:125px;margin-top: 35px; margin-left: 50px;" src="img/general-services-corporation-logo.jpg" alt="gsc">  
                                             </div>
                                            </div>
                                    </div>



<div class="sec3">

    <table class="tab">
        <tr>
            <td> 
                <p> Monthly Rent</p>
                <h2>$1,310 - $1,875</h2>
            </td>
            <td> 
                <p> Bedrooms</p>
                <h2>1 - 2 bd</h2> 
            </td>
            <td> 
                <p> Bedrooms</p>
                <h2>1 - 2 ba</h2>
            </td>
            <td> 
                <p> Square Feet</p>
                <h2>792 - 969 sq ft</h2>
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
    <button class="bt1" onclick="window.location.href='payment.html';">Buy Now</button><br>
    <button class="bt2"><a href="whatsapp.com">Send Message</a></button><br> 
    <i class="fa fa-phone fa-1x "  style="display: inline-block;"></i>
    <h3 style="display: inline-block;"> (725) 227-5949</h3><br>
    <i class="fa fa-globe" style="color: #1f5131; display: inline-block;"></i>
    <h3 style="display: inline-block;"> Language: English and Spanish</h3><br>
    <i class="fa fa-clock-o fa-1x"style="color: #1f5131; display: inline-block;"></i>
    <h3 style="display: inline-block;"> Open 8:30am - 5pm Today</h3>
</div>
</section> 


<section class="second">
   <h1>About Rancho Mirage</h1>
   <p>Welcome to Rancho Mirage Apartments in Las Vegas, where apartment living is no illusion! We have the lifestyle you're looking for - comfort and convenience in the heart of Las Vegas. Within our lush grounds you'll find grassy courtyards, grilling areas, a playground and two sparkling swimming pools with free Wi-Fi. Our spacious one and two-bedroom apartment homes offer features such as fireplaces, balconies, washers/dryers and wet bars. Pets are welcome and covered parking is available. Find all of this at Rancho Mirage Apartments in Las Vegas, right where you want to be!
   <br><br>
    Rancho Mirage is an apartment community located in <b> Clark County</b> and the<b>89103</b>  ZIP Code. This area is served by the<b> Clark County</b> attendance zone.</p>
    <h2>Unique Features</h2>
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
            <img src="img/swimming.png" style="width: 100px; height: 100px;" alt="icon">
            <h3>Pool</h3>
        </td>
        <td>
            <img src="img/gym.png" style="width: 100px; height: 100px;" alt="icon">
            <h3>Fitness Center</h3>
        </td>
        <td>
            <img src="img/playground.png" style="width: 100px; height: 100px;" alt="icon">
            <h3>Playground</h3>
        </td>
        <td>
            <img src="img/club.png" style="width: 100px; height: 100px;" alt="icon">
            <h3>Clubhouse</h3>
        </td>
    </tr>
    <tr>
        <td>
            <img src="img/access-control.png" style="width: 100px; height: 100px;" alt="icon">
            <h3>Controlled Access</h3>
        </td>
        <td>
            <img src="img/recycle.png" style="width: 100px; height: 100px;" alt="icon">
            <h3>Recycling</h3>
        </td>
        <td>
            <img src="img/bbq.png" style="width: 100px; height: 100px;" alt="icon">
            <h3>Grill</h3>
        </td>
        <td>
            <img src="img/gate.png" style="width: 100px; height: 100px;" alt="icon">
            <h3>Gated</h3>
        </td>
    </tr>
</table>
<h1 style="font-family: CostarBrownRegular;color: rgb(65, 68, 68);">Property Services</h1>
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
                <img src="img/drying.png" style="width: 100px; height: 100px;" alt="icon">
                <h3>Washer/Dryer</h3>
            </td>
            <td>
                <img src="img/air-conditioner.png" style="width: 100px; height: 100px;" alt="icon">
                <h3>Air Conditioning</h3>
            </td>
            <td>
                <img src="img/dishwasher.png" style="width: 100px; height: 100px;" alt="icon">
                <h3>Dishwasher</h3>
            </td>
            <td>
                <img src="img/speedometer.png" style="width: 100px; height: 100px;" alt="icon">
                <h3>High Speed Internet Access</h3>
            </td>
        </tr>
        <tr>
            <td>
                <img src="img/clothes-hanger.png" style="width: 100px; height: 100px;" alt="icon">
                <h3>Walk-In Closets</h3>
            </td>
            <td>
                <img src="img/countertop.png" style="width: 100px; height: 100px;" alt="icon">
                <h3>Granite Countertops</h3>
            </td>
            <td>
                <img src="img/grass.png" style="width: 100px; height: 100px;" alt="icon">
                <h3>Yard</h3>
            </td>
            <td>
                <img src="img/microwave.png" style="width: 100px; height: 100px;" alt="icon">
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
        <p><b>Property Address:</b>4250 S Arville St, Las Vegas, NV 89103</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3223.1986812506893!2d-115.19650507517723!3d36.11301707245092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c699eb22d393%3A0x757c432c0eb937b5!2zNDI1MCBTIEFydmlsbGUgU3QsIExhcyBWZWdhcywgTlYgODkxMDPYjCDYp9mE2YjZhNin2YrYp9iqINin2YTZhdiq2K3Yr9ip!5e0!3m2!1sar!2s!4v1688481005714!5m2!1sar!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
    </section>
    <h1 id="reviews" style="text-align: center; font-family: CostarBrownRegular;color: rgb(65, 68, 68);">Property Ratings at Rancho Mirage
    </h1>
    <section id="fiv">
          
        <div class="one" style="float: left;">
            <div class="rev">
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star  checked" ></i>
                <i class="fa fa-star checked"></i> </div>
               <p>Dec. 1, 2016</p> 
               <h2>Love My New Pad</h2>
               <p>After a nightmare experience at my last complex, I am thrilled to call this place my new...</p>
                <a href="#" >Read More</a>
        </div>
        <div class="one"  style="float: right;">
            <div class="rev">
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star "></i>
                <i class="fa fa-star "></i>
                <i class="fa fa-star  " ></i>
                <i class="fa fa-star "></i> </div>
               <p>May 8, 2017</p> 
               <h2>Horrible Manager...She rid of her.</h2>
               <p>This sloppy, mean spirited excuse of a manager, Stephanie should not be in the position of...</p>
                <a href="#" >Read More</a>
        </div>
    </section>





@endsection
@section('scripts')
@endsection 