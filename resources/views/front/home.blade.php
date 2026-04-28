<@extends('front.parent')
@section('title','Home')
@section('styles')

    <link rel="stylesheet" href="{{ asset('front/css/homestyle.css') }}">
   
@endsection
@section('content')


    <div class="container">
        <img id="sec1" src="{{ asset('front/img/jonathan-roger-LY1eyQMFeyo-unsplash.jpg') }}">
        <div class="center">
            <div class="center2">
                <h1>Discover Your New Home</h1>
                <h2>Helping 100 million renters find their perfect fit</h2>
                <form>
                    <input type="search" name="search" placeholder="Search..">
                    <input type="button" value="Search">
                </form> 
            </div>
        </div>
    </div>
    <section class="homesection1">
        <h2>Explore Rentals in Las Vegas, NV</h2>
       <div>
        
       @foreach ($properties as $property)
          <div class="home" ><a href="home1">
              <img src="{{asset('storage/images/property/'. $property->photo ?? "")}}" alt="home1" >
              <div class="home1">
             <h3>{{ $property->title }}</h3>
             <h5>{{ $property->address }}</h5>
              <p>{{ $property->bathrooms }} Beds | ${{ $property->price }} </p>
            </div></a>
           </div> 
            @endforeach 
        </div>
      <div id="sec1view">
       <a   href="shop">View More</a></div>

    </section>

    <section class="homesec2">
        <h2>The Most Rental Listings</h2>
        <p>Choose from over 1 million apartments, houses, condos, and townhomes for rent.</p>
        <div class="textsec2"  >
            <h3>Renting Made Simple</h3>
            <p>Browse the highest quality listings, apply online, sign your lease, and even pay your rent from any device.</p>
        </div>
        <div class="imgsec2">
            <img src="{{ asset('front/img/sec2a.png') }}" alt="map">
        </div>
    </section>
    
    <section class="homesec3">
        <div id="center">
            <h2 style="font-size: 36px;">Discover Homeownership on </h2>
            <img style="height: 52px;" src="{{ asset('front/img/apartments-for-rent-logo.png') }}" alt="logo">
        </div>
        <p>Renting is great, but maybe you’re thinking about buying a home instead. We want you to find the right place. That’s why our sister site, Homes.com, is designed to help you find your dream home, even if you’re a first time buyer.</p>
        <div class="textsec3"  >
           <h3>Explore Your Options</h3>
           <p>Deciding to become a homeowner is a big deal! Luckily,you get the most accurate homes for sale property data, an agent directory, and collaboration tools to browse with your agent and co-shopper to help you make the right decision.</p>
         </div>
        <div class="imgsec3">
          <img src="{{ asset('front/img/sec3.jpg') }}" alt="bilding">
      </div>  
    </section>
    <section class="homesec4">
       
            <h2 style="font-size: 36px;">The Perfect Place to Manage Your Property</h2>
            <p>Work with the best suite of property management tools on the market.</p>
        <div class="textsec4"  >
           <h3>Advertise Your Rental</h3>
           <p>Connect with more than 75 million renters looking for new homes using our comprehensive marketing platform.</p>
         </div>
        <div class="imgsec4">
          <img src="{{ asset('front/img/sec4a.png') }}" alt="bilding">
      </div> 
      <div class="imgsec4b"  >
        <img src="{{ asset('front/img/sec4b.png') }}" alt="bilding">
          </div>
     <div class="textsec4b">
        <h3>Lease 100% Online</h3>
        <p>Accept applications, process rent payments online, and sign digital leases all powered on a single platform.</p>
   </div> 
 <p class="sec4pr">Search over 1 million listings including <a href="home">apartments</a>,<a href="home">houses</a> , <a href="home">condos</a>, and <a href="home">townhomes</a>  available for rent.
     You’ll find your next home, in any style you prefer.</p>
    </section>
@endsection
@section('scripts')
@endsection