@extends('dashboard.cms.parent')

@section('title', 'Edit Booking')
@section('main-title', 'Edit Booking')
@section('sub-title', 'Edit Booking')

@section('styles')

@endsection

@section('content')
    <div class="card-body">

      <div class="form-group">
        <label>Status</label>
        <select id="status" class="form-control">
          <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
          <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
          <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
      </div>

      <div class="form-group">
        <label>Booking Date</label>
        <input type="date" id="booking_date" class="form-control"
               value="{{ $booking->booking_date }}">
      </div>

      <div class="form-group">
        <label>Booking Time</label>
        <input type="time" id="booking_time" class="form-control"
               value="{{ $booking->booking_time }}">
      </div>

      <div class="form-group">
        <label>Note</label>
        <input type="text" id="note" class="form-control"
               value="{{ $booking->note }}">
      </div>

      <div class="form-group">
        <label>Customer</label>
        <select id="customer_id" class="form-control">
          @foreach($customers as $customer)
            <option value="{{ $customer->id }}"
              {{ $booking->customer_id == $customer->id ? 'selected' : '' }}>
              {{ $customer->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Property</label>
        <select id="property_id" class="form-control">
          @foreach($properties as $property)
            <option value="{{ $property->id }}"
              {{ $booking->property_id == $property->id ? 'selected' : '' }}>
              {{ $property->title }}
            </option>
          @endforeach
        </select>
      </div>

    </div>

    <div class="card-footer">
      <button type="button" onclick="performUpdate({{ $booking->id }})"
              class="btn btn-primary">
        Update
      </button>
                <!-- /.card-body -->

      <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
        Go Back
      </a>
    </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performUpdate(id){
        let formData=new FormData();
    formData.append('status', document.getElementById('status').value);
    formData.append('booking_date', document.getElementById('booking_date').value);
    formData.append('booking_time', document.getElementById('booking_time').value);
    formData.append('note', document.getElementById('note').value);
    formData.append('customer_id', document.getElementById('customer_id').value);
    formData.append('property_id', document.getElementById('property_id').value);

    store('/admin/bookings/' + id, formData);
}
</script>

@endsection


