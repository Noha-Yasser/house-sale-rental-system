@extends('front.parent')
@section('title','Shop')
@section('styles')
<link rel="stylesheet" href="{{ asset('front/css/shop.css') }}">
@endsection
@section('content')
 
    <section class="Main">

        <div class="mapouter">
            <iframe height="790px" width="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=california&t=&z=9&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            
            <div class="homee">
                @foreach ($properties as $property)  
                <div class="home">
                    <img src="{{asset('storage/images/property/'. $property->photo ?? "")}}" alt="home3">
                    <a href="home1">
                        <div class="home1">
                            <h3>{{ $property->title }}</h3>
                            <h5>{{ $property->address }}</h5>
                           <p>{{ $property->bathrooms }} Beds | ${{ $property->price }} </p>
                        </div>
                    </a>
                </div>

               @endforeach 

            </div> 
        </div>
    </section>
@endsection
@section('scripts')
@endsection
   