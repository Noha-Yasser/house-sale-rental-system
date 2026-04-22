@extends('dashboard.cms.parent')

@section('title', 'Review')
@section('main-title', 'index Review')
@section('sub-title', 'index Review')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
    <div class="contect">
       <!-- <img src='{{ $property->photo }}'>
        <h4>{{$properties ->title}}</h4>
        <p>{{$properties ->address}}</p>
        <p>{{$properties ->type}} | {{$property ->status}}</p>
        <span>${{$properties -> price}}</span> -->

         <div class="reviews mt-6  d-flex justify-content-between">
            <h2 class=" bg-light shadow-sm rounded d-flex px-2 m-2 mt-4">   
                REVIEWS
            </h2>  
              <!-- Add -->
            <a href="{{ route('review.create', $properties->id) }}" class="btn btn-info btn-sm ml-1" title="add">
                                  Add Comment
            </a> 
            @foreach($properties->reviews as $review)
                <div  class="icons d-flex justify-content-between align-items-center">
                      <p class="w-100 bg-light shadow-sm rounded d-flex px-4 m-2"> 
                        {{$review->comments }}  
                      </p>   
                      <div  class="icons d-flex justify-content-center align-items-center">

                              <!-- Edit -->
                              <a href="" class="btn btn-warning btn-sm ml-1" title="edit">
                                  <i class="fas fa-edit"></i>
                              </a>

                              <!-- Delete -->
                              <button type="button" class="btn btn-danger btn-sm  ml-1" title="delete">
                                  <i class="fas fa-trash"></i>
                              </button>
                      </div>
                </div>

              
            @endforeach
          
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        confirmDestroy('/admin/cities/'+id,reference);
    }
</script>
@endsection


