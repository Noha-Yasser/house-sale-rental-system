@extends('dashboard.cms.parent')

@section('title', 'create Booking')
@section('main-title', 'create Booking')
@section('sub-title', 'create Booking')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create new Booking</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf
                <div class="card-body">

                <div class="row">
              <div class="col-12 col-sm-4">
                <div class="form-group">
          <div class="input-box">
        <label for="status">Status :</label>
        <select required id="status"  name="status">
            <option value="Available">Available</option>
            <option value="Sold">Sold</option>
            <option value="Pending">Pending</option>
          </select>
      </div>


                </div>
                <!-- /.form-group -->
              </div>
            </div>
                  <div class="form-group">
                    <label for="date">Booking date</label>
                    <input type="date" class="form-control" id="booking_date" placeholder="Enter booking date" name="booking_date" >
                  </div>
                  <div class="form-group">
                    <label for="time">booking time</label>
                    <input type="time" class="form-control" id="booking_time" placeholder="Enter Booking time" name="booking_time" >
                  </div>
                    <div class="form-group">
                    <label for="time">Note</label>
                    <input type="text" class="form-control" id="note" placeholder="Enter Booking time" name="note" >
                  </div>
                        <div class="form-group">
        <label for="customer_id">Customer</label>
        <select class="form-control" id="customer_id">
          @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="property_id">Property</label>
        <select class="form-control" id="property_id">
          @foreach($properties as $property)
            <option value="{{ $property->id }}">{{ $property->title }}</option>
          @endforeach
        </select>
      </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('bookings.index') }}" class="btn btn-primary">Go Back</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData=new FormData();
        formData.append('booking_date',document.getElementById('booking_date').value);
        formData.append('booking_time',document.getElementById('booking_time').value);
        formData.append('status',document.getElementById('status').value);
        formData.append('note',document.getElementById('note').value);
        formData.append('customer_id',document.getElementById('customer_id').value);
        formData.append('property_id',document.getElementById('property_id').value);


        store('/admin/bookings',formData)

    }
</script>

@endsection


