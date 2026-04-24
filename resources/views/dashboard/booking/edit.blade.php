@extends('dashboard.cms.parent')

@section('title', 'Edit Booking')
@section('main-title', 'Edit Booking')
@section('sub-title', 'Edit Booking')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit new Booking</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf>
                <div class="card-body">

                <div class="row">
              <div class="col-12 col-sm-4">

              </div>
            </div>

                  <div class="form-group">
                    <label for="status">Select status</label>
                    <select required id="property_id" name="property_id" class="form-control" >
                       <option selected value="{{$reviews->property->id}}"> {{ $reviews->property->title }}</option>
                      @foreach($properties as $property)
                        <option value="{{$property->id}}">{{$property->title}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="comments">Commment</label>
                    <input type="text" class="form-control" id="comments" placeholder="Enter Your Comment" name="comments" value="{{$reviews->comments}}" required>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performUpdate({{$reviews->id}})" class="btn btn-primary">Update</button>
                <a href="{{ route('reviews.index') }}" class="btn btn-primary">Go Back</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performUpdate(id){
        let formData=new FormData();
        formData.append('comments',document.getElementById('comments').value);
        formData.append('property_id',document.getElementById('property_id').value);


        storeRoute('/admin/bookings_update/'+id,formData)

    }
</script>

@endsection


