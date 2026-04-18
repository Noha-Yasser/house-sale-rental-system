@extends('dashboard.cms.parent')

@section('title', 'update company')
@section('main-title', 'update company')
@section('sub-title', 'update company')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">update new company</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf
                <div class="card-body">

             <div class="row">
             
                
                  <label>city</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="city_id" name="city_id" style="width: 100%;" >
                    <option selected>{{ $companies->city->city_name ?? ""}}</option>
                    @foreach($cities as $city)
                     <!--    <option value="{{ $city->id }}">{{ $city->city_name }}</option>-->
<option value="{{ $city->id }}" {{ $city->id == $companies->user->city_id ? 'selected' : '' }}>
    {{ $city->city_name }} 
</option>
                    @endforeach

                  </select>
                
              </div>     
                  <div class="form-group col-md-4">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
                    value="{{ $companies->user->name ?? "" }}" required>
                  </div>
                  <div class="form-group col-md-4 ">
                    <label for="phone">phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="{{ $companies->user->phone ?? ""}}" required>
                  </div>  
                               </div>
           <div class="row">
             
            
                  <div class="form-group col-md-4">
                    <label for="rating">rating</label>
                    <input type="text" class="form-control" id="rating" placeholder="Enter rating" name="logo"  value="{{ $company->rating ?? ""}}" required>
                  </div>
                
                   <div class="form-group col-md-4">
                    <label for="email">website</label>
                    <input type="text" class="form-control" id="website" placeholder="Enter website" name="website" value="{{ $companies->website ?? "" }}" required>
                  </div>
                  
                     <div class="form-group col-md-4">
                    <label for="password">description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="{{ $companies->description ?? "" }}" required>
                  </div>
            </div>

               <div class="row">
            
                  <div class="form-group col-md-4">
                    <label for="image">logo</label>
                    <input type="file" class="form-control" id="logo" placeholder="choose logo" name="logo"  value="{{ $company->logo ?? ""}}" required>
                  </div>
                
                   <div class="form-group col-md-4">
                    <label for="email">email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ $companies->email ?? "" }}" required>
                  </div>
                  
                     <div class="form-group col-md-4">
                    <label for="password">adderss</label>
                    <input type="text" class="form-control" id="adderss" placeholder="Enter adderss" name="adderss" value="{{ $companies->user->adderss ?? "" }}" required>
                  </div>
                </div>
                
                <!-- /.card-body -->
  </div>
                <div class="card-footer">
                  <button type="button" onclick="performUpdate( $companies->id)" class="btn btn-primary">Update</button>
                <a href="{{ route('companies.index') }}" class="btn btn-primary">Go Back</a>

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
        formData.append('city_id',document.getElementById('city_id').files[0]);
        formData.append('image',document.getElementById('image').value);
        formData.append('email',document.getElementById('email').value);
    
        formData.append('address',document.getElementById('address').value);
        storeRoute('/admin/companies_update/'+ id,formData)

    }
</script>

@endsection


""{{--<div class="form-group col-md-4">
                <label for="logo">Company Logo</label>
                @if($companies->logo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/companies/' . $companies->logo) }}" width="40" height="40" style="object-fit: cover;">
                    </div>
                @endif
                <input type="file" name="logo" id="logo" class="form-control-file @error('logo') is-invalid @enderror" accept="image/*">
                <small class="form-text text-muted">Leave empty to keep current logo</small>
               
            </div>--}}