@extends('dashboard.cms.parent')

@section('title', 'create Country')
@section('main-title', 'create Country')
@section('sub-title', 'create Country')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create new Country</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="country_name">country name</label>
                    <input type="text" class="form-control" id="country_name" placeholder="Enter country name" name="country_name" required>
                  </div>
                  <div class="form-group">
                    <label for="code">country code</label>
                    <input type="text" class="form-control" id="code" placeholder="Enter country code" name="code" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('countries.index') }}" class="btn btn-primary">Go Back</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData=new FormData();
        formData.append('country_name',document.getElementById('country_name').value);
        formData.append('code',document.getElementById('code').value);
        store('/admin/countries',formData)

    }
</script>

@endsection


