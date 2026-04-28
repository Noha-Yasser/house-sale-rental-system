@extends('dashboard.cms.parent')

@section('title', 'Show Data of Booking')
@section('main-title', 'Show Data of Booking')
@section('sub-title', 'Show Data of Booking')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
               <h3 class="card-title">Show Booking Details</h3>
              </div>
<form>
    <div class="card-body">

      <!-- Booking Date -->
      <div class="form-group">
        <label>Booking Date</label>
        <input type="text" class="form-control"
               value="{{ $booking->booking_date }}" disabled>
      </div>

      <!-- Booking Time -->
      <div class="form-group">
        <label>Booking Time</label>
        <input type="text" class="form-control"
               value="{{ $booking->booking_time }}" disabled>
      </div>

      <!-- Status -->
      <div class="form-group">
        <label>Status</label>
        <input type="text" class="form-control"
               value="{{ $booking->status }}" disabled>
      </div>

      <!-- Customer -->
      <div class="form-group">
        <label>Customer</label>
        <input type="text" class="form-control"
               value="{{ $booking->customer->name ?? '' }}" disabled>
      </div>

      <!-- Property -->
      <div class="form-group">
        <label>Property</label>
        <input type="text" class="form-control"
               value="{{ $booking->property->title ?? '' }}" disabled>
      </div>

      <!-- Note -->
      <div class="form-group">
        <label>Note</label>
        <textarea class="form-control" disabled>
     {{ $booking->note }}
        </textarea>
      </div>

    </div>

    <div class="card-footer">
      <a href="{{ route('bookings.index') }}" class="btn btn-primary">
        Go Back
      </a>
    </div>

</form>

</div>@endsection


