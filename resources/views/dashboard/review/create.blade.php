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
              @csrf>
              <div>
                  <div class="form-group">
                     <!-- إرسال ID بشكل مخفي -->
                    <input type="hidden" name="property_id" id="property_id" value="{{ $properties->id }}">

                    <h2>{{ $properties->title }}</h2>
                  </div>
                  <div class="form-group">
                    <label for="comments">Comment</label>
                    <input type="text" class="form-control" id="comments" placeholder="Enter your comment" name="comments" required>
                  </div>
                  <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                    <a href="{{ route('review.index') }}" class="btn btn-primary">Go Back</a>
                  </div>
              </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData=new FormData();
        formData.append('property_id',document.getElementById('property_id').value);
        formData.append('comments',document.getElementById('comments').value);
      

        store('/admin/reviews',formData)

    }
</script>

@endsection


