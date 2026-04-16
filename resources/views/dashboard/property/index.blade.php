@extends('dashboard.cms.parent')

@section('title', 'Property')
@section('main-title', 'Property')
@section('sub-title', 'Property')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Grid */
.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 20px;
}

/* Card */
.card {
  background: #f9f9f9;
  border-radius: 15px;
  padding: 15px;
  text-align: center;
  box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.card img {
  width: 100%;
  height: 140px;
  object-fit: cover;
  border-radius: 10px;
}

.card h4 {
  margin: 10px 0 5px;
}

.card p {
  color: gray;
  font-size: 14px;
}

.card span {
  display: block;
  margin: 8px 0;
  font-weight: bold;
}

.card button {
  padding: 6px 12px;
  border: none;
  background: #4a7cff;
  color: white;
  border-radius: 6px;
  cursor: pointer;
}
    </style>
@endsection

@section('content')
<h3 class="section-title">Real Estate</h3>

  <div class="grid">


    <!-- Card -->
     @foreach ($properties as $property)
        <div class="card">
        <img src='{{ $property->photo }}'>
        <h4>{{$property ->title}}</h4>
        <p>{{$property ->address}}</p>
        <p>{{$property ->type}} | {{$property ->status}}</p>
        <span>${{$property -> price}}</span>
        <div  class="d-flex justify-content-center align-items-center">
                <!-- Show -->
                <a href="" class="btn btn-info btn-sm ml-1" title="show">
                    <i class="fas fa-eye"></i>
                </a>

                <!-- Edit -->
                <a href="{{ route('properties.edit',$property->id) }}" class="btn btn-warning btn-sm ml-1" title="edit">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- Delete -->
                <button type="button" onclick="" class="btn btn-danger btn-sm  ml-1" title="delete">
                    <i class="fas fa-trash"></i>
                </button>
        </div>

        </div>
    @endforeach
   

  </div>
@endsection

@section('scripts')

@endsection


