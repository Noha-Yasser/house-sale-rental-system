@extends('dashboard.cms.parent')

@section('title', 'update Admin')
@section('main-title', 'update Admin')
@section('sub-title', 'update Admin')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">update new Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf
                <div class="card-body">

             <div class="row">
              <div class="col-12 col-sm-4">
                  <div class="form-group">
                  <label>City</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="city_id" name="city_id" style="width: 100%;" >
                    {{-- <option selected="selected">Alabama</option> --}}
                    @foreach($cities as $city)
                   <option value="{{ $city->id }}">{{ $city->city_name }}</option>
{{--  <option @if ($city->id  == $admins->user->city->city_id)selected 
@endif value="{{ city->id ?? "" }}" >{{ $city->name ?? "" }} </option>--}}
                    @endforeach

                  </select>
                </div>
                <!-- /.form-group -->
              </div>
            
                  <div class="form-group col-md-6">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
                    value="{{ $admins->user->name ?? "" }}" required>
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="phone">phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="{{ $admins->user->phone ?? ""}}" required>
                  </div>
         
               <div class="row">
             
               <div class="form-group col-md-4">
                    <label for="image">image</label>
                    <input type="file" class="form-control" id="image" placeholder="choose Image" name="image" accept="image/*" required>
                  </div>
                
               
                
                   <div class="form-group col-md-6">
                    <label for="email">email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ $admins->email ?? "" }}" required>
                  </div>
                  
                     <div class="form-group col-md-6">
                    <label for="password">address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" value="{{ $admins->user->address ?? "" }}" required>
                  </div>
                </div>
                
                <!-- /.card-body -->
  </div>
                <div class="card-footer">
                  <button type="button" onclick="performUpdate({{ $admins->id }} )" class="btn btn-primary">Update</button>
                <a href="{{ route('admins.index') }}" class="btn btn-primary">Go Back</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performUpdate(id){
        let formData=new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('phone',document.getElementById('phone').value);
        formData.append('city_id',document.getElementById('city_id').value);
         formData.append('image',document.getElementById('image').files[0]);
        formData.append('email',document.getElementById('email').value);
    
        formData.append('address',document.getElementById('address').value);
        storeRoute('/admin/admins_update/'+ id,formData)

    }
</script>

@endsection


