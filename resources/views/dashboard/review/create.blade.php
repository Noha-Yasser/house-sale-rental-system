@extends('dashboard.cms.parent')

@section('title', 'create Review')
@section('main-title', 'create Review')
@section('sub-title', 'create Review')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create new Review</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf
                <div class="card-body">

                <div class="row">
              <div class="col-12 col-sm-4">
             
              </div>
            </div>
                  
                  <div class="form-group">
                    <label for="property_id">Select Property Title</label>
                    <select required id="property_id" name="property_id" class="form-control" >
                      @foreach($properties as $property)
                        <option value="{{$property->id}}">{{$property->title}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="comments">Commment</label>
                    <input type="text" class="form-control" id="comments" placeholder="Enter Your Comment" name="comments" required>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('reviews.index') }}" class="btn btn-primary">Go Back</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData=new FormData();
        formData.append('comments',document.getElementById('comments').value);
        formData.append('property_id',document.getElementById('property_id').value);
      

        store('/admin/reviews',formData)

    }
</script>

@endsection


