@extends('dashboard.cms.parent')

@section('title', 'create company')
@section('main-title', 'create company')
@section('sub-title', 'create company')

@section('styles')

@endsection

@section('content')
           <div class="card">
    <div class="card-header">
        <h3 class="card-title">Company Information</h3>
        <div class="card-tools">
            <a href="{{ route('companies.index') }}" class="btn btn-default btn-sm">Back to List</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="company_name">Company Name <span class="text-danger">*</span></label>
                <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" required>
                
            </div>

            <div class="form-group">
                <label for="logo">Company Logo</label>
                <input type="file" name="logo" id="logo" class="form-control-file @error('logo') is-invalid @enderror" accept="image/*">
               
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
              
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
             
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" name="website" id="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}" placeholder="https://example.com">
               
            </div>

            <div class="form-group">
                <label for="rating">Rating (0-5)</label>
                <input type="number" name="rating" id="rating" step="0.1" min="0" max="5" class="form-control @error('rating') is-invalid @enderror" value="{{ old('rating', 0) }}">
               
            </div>
  <div class="form-group">
                    <label for="phone">Customer phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Customer phone" name="phone" required>
                  </div>
                      <div class="form-group">
                    <label for="email">Customer email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Customer email" name="email" required>
                  </div>
                   <div class="form-group">
                    <label for="password">Customer password</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter Customer password" name="password" required>
                  </div>
            <button type="submit" class="btn btn-primary">Save Company</button>
            <a href="{{ route('companies.index') }}" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData=new FormData();
           formData.append('city_id',document.getElementById('city_id').files[0]);
      
        formData.append('name',document.getElementById('name').value);
          formData.append('logo',document.getElementById('logo').value);
              formData.append('address',document.getElementById('address').value);
                  formData.append('description',document.getElementById('description').value);
                      formData.append('website',document.getElementById('website').value);
     formData.append('phone',document.getElementById('phone').value);
         formData.append('email',document.getElementById('email').value);
        formData.append('password',document.getElementById('password').value);
        
        store('/company/companys',formData)

    }
</script>

@endsection


