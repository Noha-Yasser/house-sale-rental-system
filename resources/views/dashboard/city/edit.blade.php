@extends('dashboard.cms.parent')

@section('title', 'Edit City')
@section('main-title', 'Edit City')
@section('sub-title', 'Edit City')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit new City</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf>
                <div class="card-body">

                <div class="row">
              <div class="col-12 col-sm-4">
                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="country_id" name="country_id" style="width: 100%;" >
                    <option selected>{{ $cities->country->country_name }}</option>
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>

                    @endforeach

                  </select>
                </div>
                <!-- /.form-group -->
              </div>
            </div>
                  <div class="form-group">
                    <label for="City_name">City name</label>
                    <input type="text" class="form-control" id="city_name" placeholder="Enter City name" name="city_name" value="{{ $cities->city_name ?? "" }}" required>
                  </div>
                  <div class="form-group">
                    <label for="street">City Street</label>
                    <input type="text" class="form-control" id="street" placeholder="Enter City street" name="street" value="{{ $cities->street }}" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performUpdate({{ $cities->id }})" class="btn btn-primary">Update</button>
                <a href="{{ route('cities.index') }}" class="btn btn-primary">Go to Index</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performUpdate(id){
        let formData=new FormData();
        formData.append('city_name',document.getElementById('city_name').value);
        formData.append('street',document.getElementById('street').value);
        formData.append('country_id',document.getElementById('country_id').value);

        storeRoute('/admin/cities-update/'+id,formData);

    }
</script>

@endsection


