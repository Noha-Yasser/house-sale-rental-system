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
             @csrf>
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
                    <input type="date" class="form-control" id="Booking_date" placeholder="Enter Booking date" name="Booking_date" >
                  </div>
                  <div class="form-group">
                    <label for="time">Booking time</label>
                    <input type="time" class="form-control" id="time" placeholder="Enter Booking time" name="time" >
                  </div>
                    <div class="form-group">
                    <label for="time">Note</label>
                    <input type="text" class="form-control" id="note" placeholder="Enter Booking time" name="note" >
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
        formData.append('Booking_date',document.getElementById('Booking_date').value);
        formData.append('time',document.getElementById('time').value);
        formData.append('satus',document.getElementById('satus').value);
        formData.append('note',document.getElementById('note').value);
        formData.append('custmer_id',document.getElementById('custmer_id').value);
        formData.append('proparty_id',document.getElementById('proparty_id').value);


        store('/admin/bookings',formData)

    }
</script>

@endsection


