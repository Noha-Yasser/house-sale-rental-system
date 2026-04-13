@extends('dashboard.cms.parent')

@section('title', 'Edit Country')
@section('main-title', 'Edit Country')
@section('sub-title', 'edit Country')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data of Country</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="country_name">country name</label>
                    <input type="text" class="form-control" id="country_name" placeholder="Enter country name" name="country_name"
                    value="{{ $countries->country_name }}"
                    required>
                  </div>
                  <div class="form-group">
                    <label for="code">country code</label>
                    <input type="text" class="form-control" id="code" placeholder="Enter country code" name="code"
                    value="{{ $countries->code }}"
                     required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performUpdate({{ $countries->id }})" class="btn btn-primary">Update</button>
                  <a href="{{ route('countries.index') }}" class="btn btn-primary">Go Back</a>
                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performUpdate(id){
        let formData=new FormData();
        formData.append('country_name',document.getElementById('country_name').value);
        formData.append('code',document.getElementById('code').value);
        storeRoute('/admin/countries_update/'+id,formData)
    }
</script>
@endsection


