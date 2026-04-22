@extends('dashboard.cms.parent')

@section('title', 'Show Estate')
@section('main-title', 'Show Estate')
@section('sub-title', 'Show Estate')

@section('styles')
    <style>
        
            /* Container */
            .container {
            max-width: 100%;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            }

            /* Title */
            h2 {
            margin-bottom: 20px;
            }

            .GoBack{
                margin-top: 20px;
                padding: 8px;
                background: #007bff;
                color: white;
                border: none;
                border-radius: 10px;
                font-size: 16px;
                cursor: pointer;
            }
            /* Full width input */
            .full {
            margin-bottom: 15px;
            }

            /* Grid (2 per row) */
            .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            }

            /* Input box */
            .input-box {
            display: flex;
            flex-direction: column;
            }

            .input-box label {
            font-size: 13px;
            color: black;
            margin-bottom: 5px;
            }

            .input-box input, .input-box select {
            padding: 3px;
            border-radius: 8px;
            border: 1px solid #ddd;
            }

            /* Button */
            .add-btn {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #00b894;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            }

            .add-btn:hover {
            background: #019875;
            }
            /* Responsive */
            @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            }
    
    </style>
@endsection

@section('content')
    <div class="container">
      
    <div class="photo w-100 bg-light shadow-sm rounded d-flex align-items-center px-2">
      here is a photo
    </div>

  <form>

    <!-- Title -->
    <div class="input-box full">
      <label for="title">Title :</label>
      <input type="text" id="title" placeholder="Title" value="{{$properties->title}}" required disabled>
    </div>

    <div class="form-grid">

      <!-- Description -->
      <div class="input-box">
        <label for="description">Description :</label>
        <input type="text" id="description" placeholder="Description" value="{{$properties->description}}" required disabled>
      </div>

      <!-- Type -->
      <div class="input-box">
        <label for="type">Type :</label>
         <select required id="type" disabled>
            <option value="Apartment" {{$properties-> type == "Apartment" ? "selected" : ""}} >Apartment</option>
            <option value="House" {{$properties-> type == "House" ? "selected" : ""}} >House</option>
            <option value="Estate" {{$properties-> type == "Estate" ? "selected" : ""}} >Estate</option>
          </select>
      </div>

      <!-- Area -->
      <div class="input-box">
        <label for="area">Area :</label>
        <input type="text" id="area" placeholder="Area" value="{{$properties->area}}" required disabled>
      </div>
      
      <!-- Zip Code -->
      <div class="input-box">
        <label for="zip_code">Zip Code :</label>
        <input type="number" id="zip_code" placeholder="Zip Code" value="{{$properties->zip_code}}" required disabled>
      </div>

      <!-- Address -->
      <div class="input-box">
        <label for="address">Address :</label>
        <input type="text" id="address" placeholder="Address" value="{{$properties->address}}" required disabled>
      </div>

      <!-- Price -->
      <div class="input-box">
        <label for="price">Price :</label>
        <input type="number" id="price" placeholder="Price" value="{{$properties->price}}" required disabled>
      </div>

      <!-- Bathrooms -->
      <div class="input-box">
        <label for="bathrooms">Bathrooms :</label>
        <input type="number" id="bathrooms" placeholder="Bathrooms" value="{{$properties->bathrooms}}" required disabled>
      </div>

      <!-- Bedrooms -->
      <div class="input-box">
        <label for="bedrooms">Bedrooms :</label>
        <input type="number" id="bedrooms" placeholder="Bedrooms" value="{{$properties->bedrooms}}" required disabled>
      </div>

      <!-- State -->
      <div class="input-box">
        <label for="state">State :</label>
        <input type="text" id="state" placeholder="State" value="{{$properties->state}}" required>
      </div>

      <!-- Status -->
      <div class="input-box">
        <label for="status">Status :</label>
        <select required id="status" disabled>
            <option value="Available"  {{$properties-> status == "Available" ? "selected" : ""}}>Available</option>
            <option value="Sold"  {{$properties-> status == "Sold" ? "selected" : ""}}>Sold</option>
            <option value="Pending"  {{$properties-> status == "Pending" ? "selected" : ""}}>Pending</option>
          </select>
      </div>
    @if($properties->primaryImage)
    <img src="{{ asset('storage/properties/' . $properties->primaryImage->image) }}" class="img-fluid">
@endif
@if($properties->images->where('is_primary', false)->count() > 0)
<h5>معرض الصور</h5>
<div class="row">
    @foreach($properties->images->where('is_primary', false) as $image)
    <div class="col-md-3 mb-2">
        <img src="{{ asset('storage/properties/' . $image->image) }}" class="img-fluid rounded">
    </div>
    @endforeach
</div>
@endif
      
    </div>

  </form>


</div>
@endsection

@section('scripts')

@endsection


