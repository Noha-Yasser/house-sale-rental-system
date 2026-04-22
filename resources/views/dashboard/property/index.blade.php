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
  height:500px;
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

    <a href="{{ route('properties.create') }}" class="btn btn-primary ml-4">ADD NEW Property</a>
  <div class="grid">


    <!-- Card -->
     @foreach ($properties as $property)
        <div class="card">
      @if($property->primaryImage)
    <img src="{{ asset('storage/properties/' . $property->primaryImage->image) }}" style="width: 80px; height: 60px; object-fit: cover;">
@else
    <img src="{{ asset('cms/dist/img/no-image.png') }}" style="width: 80px; height: 60px;">
@endif
        <h4>{{$property ->title}}</h4>
        <p>{{$property ->address}}</p>
        <p>{{$property ->type}} | {{$property ->status}}</p>
        <span>${{$property -> price}}</span>
        <p>
            <a href="">{{$property ->reviews_count}} Reviws</a>
        </p>
        <div  class="icons d-flex justify-content-center align-items-center">
                <!-- Show -->
                <a href="{{ route('properties.show',$property->id) }}" class="btn btn-info btn-sm ml-1" title="show">
                    <i class="fas fa-eye"></i>
                </a>

                <!-- Edit -->
                <a href="{{ route('properties.edit',$property->id) }}" class="btn btn-warning btn-sm ml-1" title="edit">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- Delete -->
                <button type="button" onclick="performDestroy({{ $property->id }}, this)" class="btn btn-danger btn-sm  ml-1" title="delete">
                    <i class="fas fa-trash"></i>
                </button>
        </div>

        </div>
    @endforeach
   
    <div>
        {{$properties->links()}}
    </div>
  </div>
@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        confirmDestroy('/admin/properties/'+id,reference);
    }
</script>
@endsection


