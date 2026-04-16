@extends('dashboard.cms.parent')

@section('title', 'Edit customer')
@section('main-title', 'Edit customer')
@section('sub-title', 'Edit customer')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit new customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf>
                <div class="card-body">

                <div class="row">
              <div class="col-12 col-sm-4">
                <div class="form-group">
                  <label>city</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="city_id" name="city_id" style="width: 100%;" >
                    <option selected>{{ $customrs->city->name }}</option>
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>

                    @endforeach

                  </select>
                </div>
                <!-- /.form-group -->
              </div>
            </div>
                  <div class="form-group">
                    <label for="name">customer name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter customer name" name="name" value="{{ $customrs->user->name ?? "" }}" required>
                  </div>
                  <div class="form-group">
                    <label for="email">customer email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter customer email" name="email" value="{{$customrs->email }}" required>
                  </div>

                     <div class="form-group">
                    <label for="password">customer password</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter customer password" name="password" value="{{$customrs->password }}" required>
                  </div>
                     <div class="form-group">
                    <label for="gender">customer gender</label>
                    <input type="text" class="form-control" id="gender" placeholder="Enter customer gender" name="gender" value="{{$customrs->gender }}" required>
                  </div>
                     <div class="form-group">
                    <label for="birthday">customer birthday</label>
                    <input type="text" class="form-control" id="birthday" placeholder="Enter customer birthday" name="birthday" value="{{$customrs->birthday }}" required>
                  </div>
                     <div class="form-group">
                    <label for="address">customer address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter customer address" name="address" value="{{$customrs->user->address }}" required>
                  </div>
                        <div class="form-group">
                    <label for="identity_id">customer identity_id</label>
                    <input type="text" class="form-control" id="identity_id" placeholder="Enter customer identity_id" name="identity_id" value="{{$customrs->identity_id }}" required>
                  </div>
                     <div class="form-group">
                    <label for="phone">customer phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter customer phone" name="phone" value="{{$customrs->user->phone }}" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performUpdate({{ $customers->id }})" class="btn btn-primary">Update</button>
                <a href="{{ route('customrs.index') }}" class="btn btn-primary">Go to Index</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performUpdate(id){
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

        storeRoute('/admin/customers-update/'+id,formData);

    }
</script>

@endsection


