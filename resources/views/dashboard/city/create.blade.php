@extends('dashboard.cms.parent')

@section('title', 'create City')
@section('main-title', 'create City')
@section('sub-title', 'create City')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create new City</h3>
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
                    {{-- <option selected="selected">Alabama</option> --}}
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
                    <input type="text" class="form-control" id="city_name" placeholder="Enter City name" name="city_name" required>
                  </div>
                  <div class="form-group">
                    <label for="street">City Street</label>
                    <input type="text" class="form-control" id="street" placeholder="Enter City street" name="street" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('cities.index') }}" class="btn btn-primary">Go Back</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData=new FormData();
        formData.append('city_name',document.getElementById('city_name').value);
        formData.append('street',document.getElementById('street').value);
        formData.append('country_id',document.getElementById('country_id').value);

        store('/admin/cities',formData)

    }
</script>

@endsection


