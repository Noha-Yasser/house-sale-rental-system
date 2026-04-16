@extends('dashboard.cms.parent')

@section('title', 'create Customer')
@section('main-title', 'create Customer')
@section('sub-title', 'create Customer')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create new Customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf
                <div class="card-body">

                <div class="row">
              
                <div class="form-group col-sm-4">
                  <label>City</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="city_id" name="city_id" style="width: 100%;" >
                    {{-- <option selected="selected">Alabama</option> --}}
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>

                    @endforeach

                  </select>
                </div>
                <!-- /.form-group
                
              
                -->
                <div class="form-group col-sm-4">
                    <label for="name">Customer name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Customer name" name="name" required>
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="email">Customer email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Customer email" name="email" required>
                  </div>
            </div>
            
                <div class="row">
              <div class="form-group col-sm-4">
                    <label for="gender">Customer gender</label>
                    <input type="text" class="form-control" id="gender" placeholder="Enter Customer gender" name="gender" required>
                  </div>
                   <div class="form-group col-sm-4">
                    <label for="password">Customer password</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter Customer password" name="password" required>
                  </div>
                <div class="form-group col-sm-4">
                    <label for="birthday">Customer birthday</label>
                    <input type="text" class="form-control" id="birthday" placeholder="Enter Customer birthday" name="birthday" required>
                  </div>
                
                </div>

                  
                <div class="row">
                  
               
                 
                    <div class="form-group col-sm-4">
                    <label for="address">Customer address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter Customer address" name="address" required>
                  </div>
                <div class="form-group col-sm-4">
                    <label for="identity_id">Customer identity_id</label>
                    <input type="text" class="form-control" id="identity_id" placeholder="Enter Customer identity_id" name="identity_id" required>
                  </div>

                   <div class="form-group col-sm-4">
                    <label for="phone">Customer phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Customer phone" name="phone" required>
                  </div>
                
                
                </div>

                 
               
               </div>
                <!-- /.card-body -->
</div>
                <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('customers.index') }}" class="btn btn-primary">Go Back</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData=new FormData();
           formData.append('city_id',document.getElementById('city_id').value);
        formData.append('name',document.getElementById('name').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('password',document.getElementById('password').value);
        formData.append('gender',document.getElementById('gender').value);
        formData.append('birthday',document.getElementById('birthday').value);
         formData.append('address',document.getElementById('address').value);
        formData.append('identity_id',document.getElementById('identity_id').value);
             formData.append('phone',document.getElementById('phone').value);
        store('/admin/customer',formData)

    }
</script>

@endsection


